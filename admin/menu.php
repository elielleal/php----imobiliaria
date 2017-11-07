<?php 
    if($clienteNivel == 'cliente'){ ?>
         
         
    <div id="content_menu">
            <ul>
                <li><a href="painel.php?exe=home/home">&raquo; Inicio</a></li>
                <li><a href="#">&raquo; Editar Perfil</a></li>
                <li class="titulo">Meus Anúncios</li>
                <li><a href="#">&raquo; Criar Anúncios</a></li>
                <li><a href="#">&raquo; Alugar / Vender</a></li>
                <li><a href="#">&raquo; Anúncios Ativos</a></li>
                <li><a href="#">&raquo; Anúncios pendente</a></li>
                <li><a href="#">&raquo; Aguardando aprovação</a></li>
                <li><a href="#">&raquo; Anúncios finalizados</a></li>
            </ul>
            <ul>
                <li class="titulo">Minhas Mensagens:</li>
                <li><a href="#">&raquo; Caixa de Entrada</a></li>
                <li><a href="#">&raquo; Meus E-mails</a></li>
                <li><a href="#">&raquo; Ajuda / Suporte</a></li>
            </ul>
            
        </div>
         
    
    <?php     

    }elseif($clienteNivel == 'admin'){?>
        <div id="content_menu">
            <ul>
                <li><a href="painel.php?exe=home/home">&raquo; Inicio</a></li>

                <li class="titulo">Anunciantes:</a></li>
                <li><a href="#">&raquo; Anúncios pendentes</a></li>
                <li><a href="#">&raquo; Edição de Ativos</a></li>
                <li><a href="#">&raquo; Listar Finalizados</a></li>
                <li><a href="#">&raquo; Edição de Clientes</a></li>
                <li><a href="#">&raquo; Alterar dados</a></li>
                
            </ul>
            <ul>
                <li class="titulo">Mensagens:</li>
                <li><a href="#">&raquo; Suporte ao cliente</a></li>
                <li><a href="painel.php?exe=admin-inbox/inbox">&raquo; Mensagens do site</a></li>
                <li><a href="painel.php?exe=admin-inbox/completos">&raquo; E-mails respondidos</a></li>
            </ul>
            
        </div>

         
    <?php }else{
         include_once("deslogar.php");
    }
?>


