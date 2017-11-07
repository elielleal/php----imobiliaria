<?php include "config.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Deletando Registros</title>
</head>
<body>
    <?php
        if(isset($_POST['deletar'])){
            $idPost = $_POST['id'];
            $sql_delete = 'DELETE  FROM teste WHERE id = :id';

            try{
                $query_delete = $conecta -> prepare($sql_delete);
                $query_delete -> bindvalue('id', $idPost, PDO::PARAM_STR);
                $query_delete -> execute();
                
                echo 'Deletado com sucesso';
            }
            catch(PDOException $error_delete){
                echo htmlentities('Erro ao excluir'.$error_delete -> getMessage());
            }
        }
?>
<form name="delete" action="" enctype="multipart/form-data" method="post">
<select  name="id">
<option value="-1">Selecione para deletar</option>
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
                
                    <option value="<?php echo $idPost; ?>"><?php echo $campo1; ?></option>
                    
                    
                </form>
            <?php
            }
        }
    ?>
</select>
<input type="submit" name="deletar" value="Deletar" /><br>

</body>
</html>