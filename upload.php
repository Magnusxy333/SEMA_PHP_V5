<?php
session_start();
include 'server.php';

// Verificar se o usuário está logado
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Configurações
$username = $_SESSION['username'];
$diretorioDestino = "uploads/";
$maxFileSize = 2 * 1024 * 1024; // 2MB

// Criar diretório se não existir
if (!file_exists($diretorioDestino)) {
    mkdir($diretorioDestino, 0777, true);
}

// Processar upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['foto_perfil'])) {
    $nomeArquivo = $_FILES['foto_perfil']['name'];
    $tamanhoArquivo = $_FILES['foto_perfil']['size'];
    $arquivoTmp = $_FILES['foto_perfil']['tmp_name'];
    $erroUpload = $_FILES['foto_perfil']['error'];
    
    // Verificar erros
    if ($erroUpload !== UPLOAD_ERR_OK) {
        die("Erro no upload: Código $erroUpload");
    }
    
    // Verificar tamanho
    if ($tamanhoArquivo > $maxFileSize) {
        die("Erro: Arquivo muito grande. Tamanho máximo permitido é 2MB.");
    }
    
    // Verificar se é imagem
    $permitidos = array('jpg', 'jpeg', 'png', 'gif');
    $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
    if (!in_array($extensao, $permitidos)) {
        die("Erro: Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.");
    }
    
    // Gerar nome único
    $novoNome = uniqid() . '.' . $extensao;
    $caminhoCompleto = $diretorioDestino . $novoNome;
    
    // Mover arquivo
    if (move_uploaded_file($arquivoTmp, $caminhoCompleto)) {
        // Atualizar banco de dados
        $sql = "UPDATE tb_register SET foto_perfil = '$caminhoCompleto' WHERE username = '$username'";
        $resultado = mysql_query($sql);
        
        if ($resultado) {
            // ATUALIZAR A SESSÃO COM A NOVA FOTO - ISSO É FUNDAMENTAL!
            $_SESSION['foto_perfil'] = $caminhoCompleto;
            $_SESSION['mensagem'] = "Foto de perfil atualizada com sucesso!";
        } else {
            $_SESSION['erro'] = "Erro ao atualizar o banco de dados: " . mysql_error();
        }
    } else {
        $_SESSION['erro'] = "Erro ao mover o arquivo para o diretório de destino.";
    }
    
    // Redirecionar de volta para o perfil
    header('Location: profile.php');
    exit;
}
?>