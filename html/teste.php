<?php
session_start();
include '../server.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
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

.icon_profile_image{
  margin-right: 15px;
}

.icon_profile_image{
  background-color: rgb(157, 178, 191);
  
  font-family: 'Genova';
  font-weight: bold;
 
  padding: 7px;
 
  border: solid 2px;
  border-radius: 10px;
 
  cursor: pointer;
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
                  <i class="fas fa-user-circle"></i>
                  PERFIL
              </a>
              <a class="areas-text" href="logout.php">
                  SAIR
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

              <form action="../upload.php" method="POST" enctype="multipart/form-data">
                
                <button type="submit" name="buttonImage" > trocar foto</button>
              </form>

                
              
              
              
              <img src="../images/icons/icon_button.png" >
              
              <p style="margin: 0px;">foto de perfil do usuário</p>
            
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
    var iconElement = toggleElement.querySelector('i');
    
    if (passwordElement.textContent === '••••••••') {
        // Mostrar senha real (substitua pelo valor real da senha)
        passwordElement.textContent = '<?php echo htmlspecialchars($linha["senha"]); ?>';
        toggleElement.innerHTML = '<i class="fas fa-eye-slash"></i> Ocultar senha';
    } else {
        // Ocultar senha
        passwordElement.textContent = '••••••••';
        toggleElement.innerHTML = '<i class="fas fa-eye"></i> Mostrar senha';
    }
});
</script>

</body>
</html>