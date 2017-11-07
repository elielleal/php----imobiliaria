<?php require_once('Connections/painel_config.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usuario'])) {
  $loginUsername=$_POST['usuario'];
  $password=$_POST['senha'];
  $MM_fldUserAuthorization = "usuarioNivel";
  $MM_redirectLoginSuccess = "admin/painel.php";
  $MM_redirectLoginFailed = "admin/erro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_painel_config, $painel_config);
  	
  $LoginRS__query=sprintf("SELECT email, senha, usuarioNivel FROM eliel_clientes WHERE email=%s AND senha=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $painel_config) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'usuarioNivel');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br"><head>
        <title>Eliel Imóveis</title>
        <link rel="stylesheet" type="text/css" href="style.css">
             <?php include "Connections/config.php";?>
   <?php include "js/scripts.php"; ?>
        <?php include "funcoes.php"; ?>
        <meta charset="UTF-8">

    </head>
    <body>
       <div id="box">
 	<div id="header">
    	<div id="header_topo">
        <a href="index.php"><img src="images/logoss.png" alt="Home" title="Home"/></a>
        <ul>
        <li><a href="index.php?pg=categorias">Comprar</a></li>
        <li><a href="index.php?pg=categorias">Alugar</a></li>
        <li><a href="index.php?pg=anunciar">Anunciar</a></li>
        <li><a href="index.php?pg=contatos">Contatos</a></li>
        </ul>
         </div>
        
        <div id="header_navegar">
        	<div id="header_navegar_central">
            	<div id="header_navegar_central_anunciante">
                    <form name="central_anunciante" data-toggle="validator" action="<?php echo $loginFormAction; ?>" method="POST" >
                         <label for=""><span>E-mail:</span>
                         <input type="email" name="usuario" placeholder="Informe seu E-mail" data-error="Por favor, informe um e-mail correto" require></label>

                         <label for=""><span class="senha_text">Senha:</span>
                         <input type="password" name="senha" class="senha"/>
                         <input type="submit" name="Enviar" value="" class="btn" require></label>
                    </form>
                    <p><a href="admin/recover.php">[Esqueci minha senha]</a></p>
                </div>
                <div id="header_navegar_central_anuncie">
                    <div class="header_navegar_central_anuncie">
                        <a href="index.php?pg=anunciar">Clique aqui e Anúncie</a>
                        <p>Anuncie conosco, esta é a melhor maneira de vender ou alugar seu imóvel</p>
                    </div>
                </div>
            </div>
            
            <div id="header_navegar_filtro">
               <h1>Busque seu Imóvel</h1>
               <h2>Busca Interativa - Selecione abaixo!</h2>

                <form class="filtrar_avancado" method="post" action="index.php?pg=filtro" >
                    <select name="tipo">
                        <option value="">Comprar ou Alugar?</option>
                        <option value="Comprar">Comprar</option>
                        <option value="Alugar">Alugar</option>
                    </select>
                    <select name="categoria">
                        <option value="" disabled="disabled" selected>Categoria do Imóvel</option>
                    </select>
                    <select name="sub-cat">
                        <option value="" disabled="disabled" selected>Qual imóvel desejado?</option>
                    </select>
                    <select name="bairro">
                        <option value="" disabled="disabled" selected>Qual o bairro desejado?</option>
                    </select>

                    <span>Selecionde seu Imóvel</span>
                    <input type="submit" name="Listar" value="Buscar Imóveis" class="btn"/>
                </form>

            </div>
            <div id="header_navegar_publicidade">
                <h1>Publicidade</h1>
                <a href="#"><img src="midias/i.jpg" alt="" title=""/></a>
            </div>
        </div>
        
    </div>

    