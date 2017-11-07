<?php include_once("../modelo/sistema/restrito_all.php")?>
<?php include_once("sistema/validar_user.php")?>
<?php include_once("../modelo/header.php")?>


    
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
        <?php include_once("../modelo/menu.php")?>
        
        <div id="content_conteudo">
            
        </div>
    </div>
    
    <?php include_once("../modelo/footer.php")?>
    