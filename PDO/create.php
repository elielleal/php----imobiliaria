<?php include "config.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inserindo Registros</title>
</head>
<body>
    <?php 
        if(isset($_POST['enviar'])){

        /*strip_tags serve para nao deixar colocar codigos de php dentro do banco de dados, para nao deixar invadir o site*/
            $campo1 = strip_tags(trim($_POST['campo1']));
            $campo2 = strip_tags(trim($_POST['campo2']));

            $sql_teste = 'INSERT INTO teste (campo1, campo2) ';
            $sql_teste .= 'VALUES (:campo1, :campo2)';

            try{
                $query_teste = $conecta -> prepare($sql_teste);
                $query_teste -> bindvalue(':campo1', $campo1, PDO::PARAM_STR);
                $query_teste -> bindvalue(':campo2', $campo2, PDO::PARAM_STR);
                $query_teste -> execute();
                echo('Campo com sucesso!');
            }
            catch(PDOException $error_cadastrar){
            echo htmlentities('Erro ao cadastrar'.$error_cadastrar -> getMessage());
        }
    }
?>

<form name="testando" action="" enctype="multipar/form-data" method="post">
    <input type="text" name="campo1" ><br/>
    <input type="text" name="campo2" ><br/>
    <input type="submit" name="enviar" value="Enviar">
</form>
</body>
</html>