<?php 
 include 'server.php';

  $username = $_POST["txt_username"];
	
  $nome = $_POST["txt_nome"];	
	$sobrenome = $_POST["txt_sobrenome"];
	
  $email = $_POST["txt_email"];	
	
  $password = $_POST["txt_password"];	
  $confirmPassword = $_POST["txt_confirmPassword"];
	



	$sql = mysql_query("SELECT * FROM tb_register
	WHERE username = '$username' or email = '$email' ");
	if ($password !== $confirmPassword) {
	echo "As senhas nao sao iguais, por favor, tente novamente";
	} 
	elseif (mysql_num_rows($sql) >0) {
	echo "<center>";
	echo "<hr>";
	echo "conta existente";
	echo "<hr>";
	echo "<br>";
	}
	elseif (empty($username) || empty($email) || empty($nome) || empty($sobrenome) || empty($password) || empty($confirmPassword)) {
		echo "<center>";
		echo "<hr>";
		echo "Todos os campos devem ser preenchidos!!!";
		echo "<hr>";
		echo "<br>";
	}
	else {
	$sql = mysql_query("INSERT INTO tb_register (username, nome, sobrenome, email, senha) 
	VALUES ('$username', '$nome', '$sobrenome', '$email', '$password')") ;
	
  header('location:html/login.php');
  
  /*
  echo "<center>";
	echo "<hr>";
	echo "conta criada com sucesso";
	echo "<hr>";
	echo "<br>"; 
  */
	}
	
	//echo "<a href=\"listagem.php\"> LISTA DE CONTAS <\a>";
	//header('location:listagem.php'); ABRIR DIRETAMENTE SEM O LINK (NÃO PRECISA CLICAR PARA FUNFAR)
?>