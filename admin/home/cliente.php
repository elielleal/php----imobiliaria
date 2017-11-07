<?php include_once("sistema/restrito_all.php")?>
<?php include_once("sistema/validar_user.php")?>
<?php include_once("header.php")?>


    
    <div id="local">
        <div class="caminho">
            Onde Estou: Eliel Imóveis &raquo;
            Painel de Controle &raquo; Admin de perfil
        </div>
        <div class="welcome">
          
          <div class="welcome">Olá <?php echo $clienteNome; ?>, bem vindo!! <?php echo date('d/m/Y H:i').'h'; ?> | <a class="desl" href="deslogar.php">Deslogar</a></div>
        </div>
    </div>


    <div id="content">
        <?php include_once("menu.php")?>
        
        <div id="content_conteudo">
            <?php echo $clienteNome.'<br>';
             echo $clienteEmail.'<br>';
            echo $clienteNivel.'<br>';
            ?>
        </div>
    </div>
    
    <?php include_once("footer.php")?>