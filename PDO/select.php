<?php include "config.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Selecionando Registros</title>
</head>
<body>
    <?php
        $sql_select = 'SELECT * FROM teste';

        try{
            $query_select = $conecta -> prepare($sql_select);
            $query_select -> execute();
            $resultado_query = $query_select->fetchAll(PDO::FETCH_ASSOC);
            $count = $query_select->rowCount(PDO::FETCH_ASSOC);
            
        }
        catch(PDOException $error_select){
            echo htmlentities('Erro ao selecionar'.$error_select -> getMessage());
        }

        if($count == 0){
            echo 'Nada foi encontrado';
        }else{
            foreach($resultado_query as $res){
                $idPost = $res['id'];
                $campo1 = $res['campo1'];
                $campo2 = $res['campo2'];
                echo $idPost.' - '.$campo1.' - '.$campo2.'<br/>';
            }
        }
    ?>


</body>
</html>