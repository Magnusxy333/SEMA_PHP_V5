<?php
session_start();
include '../server.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Processar upload de foto se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto_perfil'])) {
    $username = $_SESSION['username'];
    $diretorioDestino = "../uploads/";
    
    // Criar diretório se não existir
    if (!file_exists($diretorioDestino)) {
        mkdir($diretorioDestino, 0777, true);
    }
    
    // Buscar informações do usuário para obter a foto atual
    $sql_user = mysql_query("SELECT foto_perfil FROM tb_register WHERE username = '$username'");
    $user_data = mysql_fetch_assoc($sql_user);
    $foto_antiga = $user_data['foto_perfil'];
    
    // Gerar nome único para o novo arquivo
    $nomeArquivo = uniqid() . '_' . basename($_FILES['foto_perfil']['name']);
    $caminhoCompleto = $diretorioDestino . $nomeArquivo;
    
    // Verificar se é uma imagem
    $permitidos = array('jpg', 'jpeg', 'png', 'gif');
    $extensao = strtolower(pathinfo($_FILES['foto_perfil']['name'], PATHINFO_EXTENSION));
    
    if (in_array($extensao, $permitidos)) {
        // Mover arquivo para o diretório de destino
        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $caminhoCompleto)) {
            // Excluir a foto anterior se existir e não for a padrão
            if (!empty($foto_antiga) && $foto_antiga !== '../images/icons/icon_button.png' && file_exists($foto_antiga)) {
                unlink($foto_antiga);
            }
            
            // Atualizar no banco de dados
            $sql = "UPDATE tb_register SET foto_perfil = '$caminhoCompleto' WHERE username = '$username'";
            mysql_query($sql);
            $mensagem = "Foto de perfil atualizada com sucesso!";
            
            // Atualizar a sessão com o novo caminho da foto
            $_SESSION['foto_perfil'] = $caminhoCompleto;
        } else {
            $erro = "Erro ao fazer upload da foto.";
        }
    } else {
        $erro = "Formato de arquivo não permitido. Use JPG, JPEG, PNG ou GIF.";
    }
}

// Buscar informações apenas do usuário logado
$username = $_SESSION['username'];
$sql = mysql_query("SELECT * FROM tb_register WHERE username = '$username'");

// Verificar se a query foi bem-sucedida
if ($sql === false) {
    die('Erro na consulta SQL: ' . mysql_error());
}

// Obter os dados do usuário
$linha = mysql_fetch_assoc($sql);

// Verificar se encontrou o usuário
if (!$linha) {
    die('Usuário não encontrado.');
}

// Armazenar a foto do perfil na sessão se ainda não estiver
if (!isset($_SESSION['foto_perfil']) && !empty($linha['foto_perfil'])) {
    $_SESSION['foto_perfil'] = $linha['foto_perfil'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil - SEMA</title>
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="icon" href="../images/icon-site.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
@font-face {
  font-family: 'Genova';
  src: url('../../fonts/Genova.otf');
}

.container-grid {
  margin-bottom: 100px;
  padding-left: 30px;
  padding-right: 30px;
  display: grid;
  align-items: center;
  font-family: Genova;
  border: 2px solid;
  border-radius: 10px;
}

.user-info {            
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 20px;
}

.info-item {
  margin-bottom: 15px;
  padding-bottom: 15px;
}

.info-label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.info-value {
    color: #27374D;
    font-size: 18px;
}

.password-section {
    display: flex; 
    flex-direction: row;           
}

.image_profile{
  margin-left: 30px;
  margin-bottom: 30px;
}

.image_side{
  display: flex; 
  flex-direction: column; 
  align-items: center;
  font-family: Genova;
  font-weight: bold;
}

.profile-picture {
    width: 160px;
    height: 160px;
    border-radius: 50%;
    object-fit: cover;
    
    margin-bottom: 15px;
    transition: transform 0.3s ease;
    cursor: pointer;
}

.profile-picture:hover {
    transform: scale(1.05);
}

.upload-form {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 15px;
    position: relative;
    width: 100%;
}

.upload-form input[type="file"] {
    position: absolute;
    left: 0;
    top: 0;
    opacity: 0;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.custom-file-button {
    background: #4a6fc7;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 600;
    transition: background 0.3s;
    position: relative;
    z-index: 1;
    width: 100%;
    text-align: center;
}

.custom-file-button:hover {
    background: #3b5aa6;
}

.file-name {
    margin-top: 8px;
    font-size: 12px;
    color: #666;
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.message {
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.header-profile-img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 8px;
    border: 2px solid #fff;
    transition: all 0.3s ease;
}



.preview-container {
    position: relative;
    margin-bottom: 15px;
}

.preview-text {
    color: white;
    font-weight: bold;
    text-align: center;
    font-size: 14px;
}

.upload-status {
    margin-top: 10px;
    font-size: 14px;
    color: #4a6fc7;
}

.upload-instructions {
    font-size: 12px;
    color: #666;
    text-align: center;
    margin-top: 5px;
    max-width: 200px;
}
    </style>
</head>
<body>
    
  <div class="header">
      <div class="left">
          <a href="../index.php">
              <img class="icon" src="../images/sema.png" alt="icon">
          </a>
      </div>

      <div class="right">
          <a class="areas-text" href="../index.php">                    
              <i class="fas fa-house-user"></i>                   
              HOME                     
          </a>

          <a class="areas-text" href="location.php">
              <i class="fas fa-map-marker-alt"></i>
              LOCALIZAÇÃO
          </a>

          <a class="areas-text" href="orientations.php">
              <i class="fas fa-book-open"></i>
              ORIENTAÇÕES
          </a>

          <a class="areas-text" href="contacts.php">
              <i class="fas fa-phone-alt"></i>
              CONTATOS
          </a>

          <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
          <div style="display: flex; flex-direction: column; align-items: center;">
              <a class="areas-text" href="profile.php">
                  
              
            <div style="display: flex; flex-direction: column; align-items: center;">
                
             <div style="display: flex; flex-direction: row; align-items: center;">       

              <div>
                <?php if (isset($_SESSION['foto_perfil']) && !empty($_SESSION['foto_perfil'])): ?>
                      <img  src="<?php echo $_SESSION['foto_perfil']; ?>?t=<?php echo time(); ?>" class="header-profile-img" id="header-profile-img">
                <?php else: ?>
                      <i class="fas fa-user-circle" style="margin: 8px;"></i>
                <?php endif; ?>
              </div>           
                

              <div>

                <p style="margin: 0px">
                PERFIL
                </p>

              </div>
                                 
              </div>

                <a class="areas-text" href="logout.php">
                  SAIR
              </a>

              </div>        
                    
              </a>
              
          </div>
          <?php else: ?>
          <a class="areas-text" href="login.php">
              <i class='fas fa-sign-in-alt' id="login-size"></i>
              ENTRAR
          </a>
          <?php endif; ?>
      </div>
  </div> 

  <div class="main">
    <div class="container-grid">
      <h1>Informações do usuário</h1>
      <div class="user-info">

      <?php if (isset($mensagem)): ?>
        <div class="message success"><?php echo $mensagem; ?></div>
      <?php endif; ?>
      
      <?php if (isset($erro)): ?>
        <div class="message error"><?php echo $erro; ?></div>
      <?php endif; ?>
      
      <div style="display: flex; flex-direction: row; align-items: center;">       
          <div>
            <div class="info-item">
            <span class="info-label">Usuário:</span>
            <span class="info-value"><?php echo htmlspecialchars($linha['username']); ?></span>
          </div>
        
          <div class="info-item">
            <span class="info-label">Email:</span>
            <span class="info-value"><?php echo htmlspecialchars($linha['email']); ?></span>
          </div>
        
          <div class="info-item">
            <span class="info-label">Nome completo:</span>
            <span class="info-value"><?php echo htmlspecialchars($linha['nome'] . ' ' . $linha['sobrenome']); ?></span>
          </div>
          
          <div class="info-item password-section">
              <div>
                <span class="info-label">
                Senha:
                </span>
                <span id="password-value" class="info-value">
                  ••••••••
                </span>
              </div>
              
            <div style="margin-left: 20px; margin-top: 23px;">
              <a href="#" id="toggle-password" style="color: #007bff; text-decoration: none; cursor: pointer;">
                <i class="fas fa-eye"></i> Mostrar senha
              </a>
            </div>
          </div>
       </div>  
        
        <div class="image_profile">
          <div class="image_side">
            <?php
            // Exibir a foto de perfil atual ou a padrão
            $foto_perfil = !empty($linha['foto_perfil']) ? $linha['foto_perfil'] : '../images/icons/icon_button.png';
            ?>
            
            <div class="preview-container">
                <img src="<?php echo $foto_perfil; ?>?t=<?php echo time(); ?>" class="profile-picture" alt="Foto de perfil" id="preview-image">
            </div>
            
            <form action="" method="POST" enctype="multipart/form-data" class="upload-form" id="upload-form">
                <button type="button" class="custom-file-button" id="file-button">
                    <i class="fas fa-camera"></i> Escolher nova foto
                </button>
                <input type="file" name="foto_perfil" id="foto-input" accept="image/jpeg, image/png, image/jpg" required>
                <div class="file-name" id="file-name"></div>
                <div class="upload-status" id="upload-status"></div>
                <button type="submit" class="custom-file-button" style="margin-top: 10px;">
                    <i class="fas fa-upload"></i> Salvar alterações
                </button>
            </form>
            
            <div class="upload-instructions">
                Formatos suportados: JPG, PNG, GIF<br>
                Tamanho máximo: 2MB
            </div>
          </div>
        </div>                      
      </div>
    </div>            
  </div>

<script>
document.getElementById('toggle-password').addEventListener('click', function(e) {
    e.preventDefault();
    
    var passwordElement = document.getElementById('password-value');
    var toggleElement = document.getElementById('toggle-password');
    
    if (passwordElement.textContent === '••••••••') {
        // Mostrar senha real
        passwordElement.textContent = '<?php echo htmlspecialchars($linha["senha"]); ?>';
        toggleElement.innerHTML = '<i class="fas fa-eye-slash"></i> Ocultar senha';
    } else {
        // Ocultar senha
        passwordElement.textContent = '••••••••';
        toggleElement.innerHTML = '<i class="fas fa-eye"></i> Mostrar senha';
    }
});

// Mostrar nome do arquivo selecionado e preview
document.getElementById('foto-input').addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
        var fileName = this.files[0].name;
        document.getElementById('file-name').textContent = fileName;
        
        // Verificar tamanho do arquivo
        if (this.files[0].size > 2 * 1024 * 1024) {
            document.getElementById('upload-status').textContent = 'Arquivo muito grande! Máximo 2MB.';
            document.getElementById('upload-status').style.color = 'red';
            this.value = '';
            return;
        } else {
            document.getElementById('upload-status').textContent = '';
        }
        
        // Mostrar preview da imagem
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
            
            // Atualizar também a imagem no header
            var headerImg = document.getElementById('header-profile-img');
            if (headerImg) {
                headerImg.src = e.target.result;
            }
        }
        reader.readAsDataURL(this.files[0]);
    }
});

// Permitir clicar na imagem para abrir o seletor de arquivos
document.getElementById('preview-image').addEventListener('click', function() {
    document.getElementById('foto-input').click();
});

document.getElementById('trigger-upload').addEventListener('click', function() {
    document.getElementById('foto-input').click();
});

// Feedback visual durante o upload
document.getElementById('upload-form').addEventListener('submit', function() {
    var submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Enviando...';
    submitBtn.disabled = true;
});
</script>

</body>
</html>