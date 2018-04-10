<?php
    $server = "localhost"; //Endereço do servidor
    $user = "root"; //Nome do usuário
	$password = ""; //Senha
	$database = "db_videoteca"; //Nome do banco de dados a ser usado
    $conexao = mysqli_connect($server, $user, $password) or die("Não foi possível conectar-se ao servidor. Erro: ". mysql_error());
	//Seleciona o banco de dados específico no servidor
	$select = mysqli_select_db ($conexao, $database) or die("Não foi possível conectar-se ao banco de dados. Erro: ". mysql_error());
	//Fim da conexão
	mysqli_set_charset($conexao,'utf8'); //Determina chartset como UTF-    8
?>