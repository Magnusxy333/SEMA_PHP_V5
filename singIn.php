<?php
	
	session_start();

	include 'server.php';
	
	$username = $_POST["txt_username"];
	$password = $_POST["txt_password"];	

	$sql = mysql_query("SELECT * FROM tb_register WHERE username = '$username' and senha = '$password' ");
	if ($sql && mysql_num_rows($sql) > 0 ) {
	// Login bem-sucedido - definir variáveis de sessão
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    
    // Redirecionar para a página principal
    header('Location: index.php');
    exit;
	} else {
	echo "<center>";
	echo "<hr>";
	echo "Acesso negado";
	echo "<hr>";
	echo "<br>"; }
	
	
?>