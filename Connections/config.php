<?php
    define('HOST','localhost');
    define('DB','imobi');
    define('USER','root');
    define('PASS','');

    $conexao = 'mysql:host='.HOST.';dbname='.DB;
    try{
        $conecta = new PDO($conexao, USER, PASS);
        $conecta -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }catch(PDOException $error_conecta){
        echo htmlentities('Erro ao conectar'.$error_conecta -> getMessage());
    }
?>

