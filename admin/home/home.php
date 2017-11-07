<?php include_once("sistema/restrito_all.php")?>
<?php include_once("sistema/validar_user.php")?>

<?php 
    if($clienteNivel == 'cliente'){
         include_once("cliente.php");

    }elseif($clienteNivel == 'admin'){
         include_once("admin.php");
    }else{
         include_once("deslogar.php");
    }
?>