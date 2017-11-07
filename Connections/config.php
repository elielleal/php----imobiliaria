<?php
define('HOST','localhost');
define('DB','imobi');
define('USER','root');
define('PASS','');
$conexao = 'mysql:host='.HOST.';dbname='.DB;
try{
	$conecta = new PDO($conexao,USER,PASS);
	$conecta->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	}catch(PDOexception $error_conecta){
	  'Erro ao conectar, favor informe no email eliel_leal_13@hotmail.com.br';
	}
?>
