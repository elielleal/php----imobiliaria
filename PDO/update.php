<?php include "config.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizando Registros</title>
</head>
<body>
    <?php 
        if(isset($_POST['atualizar'])){

        /*strip_tags serve para nao deixar colocar codigos de php dentro do banco de dados, para nao deixar invadir o site*/
            $campo1 = strip_tags(trim($_POST['campo1']));
            $campo2 = strip_tags(trim($_POST['campo2']));
            $idPost = strip_tags(trim($_POST['id']));

            $sql_atualiza = 'UPDATE teste SET campo1 = :campo1, campo2 = :campo2 WHERE id = :idPost';

            try{
                $query_update = $conecta -> prepare($sql_atualiza);
                $query_update -> bindvalue(':campo1', $campo1, PDO::PARAM_STR);
                $query_update -> bindvalue(':campo2', $campo2, PDO::PARAM_STR);
                $query_update -> bindvalue(':idPost', $idPost, PDO::PARAM_STR);
                $query_update -> execute();
                echo('Atualizado com sucesso!');
            }catch(PDOException $error_update){
                echo htmlentities('Erro ao atualizar'.$error_update -> getMessage());
            }
        }
    ?>
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
                
                ?>

                <form name="atualizar" action="" enctype"multipar/form-data" method="post">
                    campo 1:<input type="text" name="campo1" value="<?php echo $campo1;?>"/><br/>
                    campo 2:<input type="text" name="campo2" value="<?php echo $campo2;?>"/><br/>
                    <input type="hidden" name="id" value="<?php echo $idPost;?>"/><br/>
                    <input type="submit" name="atualizar" value="Atualizar"><br><br>
                </form>
                <?php
            }
        }
    ?>
    

</body>
</html>