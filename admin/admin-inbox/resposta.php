<?php include_once("sistema/restrito_admin.php")?>
<?php include_once("sistema/validar_user.php")?>
<?php include_once("header.php")?>




    
    <div id="local">
        <div class="caminho">
            Onde Estou: Eliel Imóveis &raquo;
            Painel de Controle &raquo; Admin de perfil &raquo; Reposta dos E-mails
        </div>
        <div class="welcome">
          
          <div class="welcome">Olá <?php echo $clienteNome; ?>, bem vindo!! <?php echo date('d/m/Y H:i').'h'; ?> | <a class="desl" href="deslogar.php">Deslogar</a></div>
        </div>
    </div>


    <div id="content">
        <?php include_once("menu.php")?>
        
        <div id="content_conteudo">
            <?php include_once("sistema/carregando.php");?>
   

<?php include_once("sistema/carregando.php");?>
   
   
   <?php if(isset($_POST['executar'])){
$emailAdmin    = 'eliel_leal_13@hotmail.com.br';
$emailAssunto  = 'CONTATO ELIEL IMOVEIS';
$emailStatus   = 'completo';
$emailResposta = date('Y-m-d H:m:s');

$headers = "From: $emailAdmin\n";
$headers .= "content-type: text/html; charset=\"utf-8\"\n\n";

$emailId           = $_POST['emailId'];
$emailTxt          = strip_tags(trim($_POST['mensagem']));
$emailClienteEmail = $_POST['cliente-email'];
$emailNome    = $_POST['emailNome'];

$recebidoEm = $_POST['emailData'];
$mensagemEm = $_POST['emailMensagem'];

$sql_enviaAdmin  = 'UPDATE eliel_mailadmin SET ';
$sql_enviaAdmin .= 'emailStatus = :emailStatus, emailResposta = :emailResposta, emailTxt = :emailTxt WHERE emailId = :emailId';

   try{
	   $query_enviaAdmin = $conecta->prepare($sql_enviaAdmin);
	   $query_enviaAdmin->bindValue(':emailStatus',$emailStatus,PDO::PARAM_STR);
	   $query_enviaAdmin->bindValue(':emailResposta',$emailResposta,PDO::PARAM_STR);
	   $query_enviaAdmin->bindValue(':emailTxt',$emailTxt,PDO::PARAM_STR);
	   $query_enviaAdmin->bindValue(':emailId',$emailId,PDO::PARAM_STR);
	   $query_enviaAdmin->execute();
	   echo '<div class="ok">Mensagem Enviada com sucesso</div>';
	   
	     $mensagemEnvio = "Olá <strong>$emailNome</strong> a Eliel Imóveis Agradece seu contato:<br /><br />
		 <strong>Em resposta:</strong> $emailTxt<br /><br />
         <strong>Recebemos sua mensagem em:</strong> $emailData;<br />
         <strong>Resposta em:</strong> $recebidoEm<br /><br />
         <strong>Mensagem recebida:</strong> $mensagemEm
		 ";
		 
		 mail($emailClienteEmail,$emailAssunto,$emailTxt,$headers);
	   
	   
	   }catch(PDOexception $error_adminEmail){
		   echo 'Erro ao atualizar o email'.$error_adminEmail->getMessage();
   }
}?>
   



<div class="inbox">

<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr style="background:#666; color:#FFF; font:12px Arial, Helvetica, sans-serif; font-weight:bold;">
    <td align="center">DATA:</td>
    <td align="center">NOME:</td>
    <td align="center">EMAIL:</td>
    <td align="center">EXECUTAR:</td>
  </tr>
<?php
$emailId = $_GET['emailId'];

$sql_inboxAdmin = 'SELECT * FROM eliel_mailadmin WHERE emailId = :emailId ORDER BY emailData ASC';

try{
	$query_inboxAdmin = $conecta->prepare($sql_inboxAdmin);
	$query_inboxAdmin->bindValue(':emailId',$emailId,PDO::PARAM_STR);
	$query_inboxAdmin->execute();
	
	$resultado_inboxAdmin = $query_inboxAdmin->fetchAll(PDO::FETCH_ASSOC);
	
	}catch(PDOexception $error_inboxAdmin){
	   echo 'Erro ao selecionar pendentes';
	}
	
	foreach($resultado_inboxAdmin as $res_inboxAdmin){
		$emailId        = $res_inboxAdmin['emailId'];
		$emailNome      = $res_inboxAdmin['emailNome'];
		$emailEmail     = $res_inboxAdmin['emailEmail'];
		$emailMensagem  = $res_inboxAdmin['emailMensagem'];
		$emailData      = $res_inboxAdmin['emailData'];
		$emailStatus    = $res_inboxAdmin['emailStatus'];
		$emailResposta  = $res_inboxAdmin['emailResposta'];
		$emailTxt       = $res_inboxAdmin['emailTxt'];
		$i=0;
		$i++;
		if($i % 2 == 0){
			$cor = 'style="background:#E6FFF2"';
		}else{
			$cor = 'style="background:#f4f4f4;"';
		}

?>  
  
  <tr <?php echo $cor;?>>
    <td align="center"><?php echo date('d/m/Y H:i',strtotime($emailData));?>h</td>
    <td align="center"><?php echo $emailNome;?></td>
    <td align="center"><?php echo $emailEmail;?></td>
    <td align="center"><a href="painel.php?exe=admin-inbox/inbox">Voltar</a></td>
  </tr>

  <tr style="background:#666; color:#FFF; font:12px Arial, Helvetica, sans-serif; font-weight:bold;">
    <td align="center" style="color:#FF4040; font: 12px Arial, Helvetica, sans-serif; font-weight: bold; ">MENSAGEM:</td>
    <td align="center" colspan="3" style="font:14px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#00BFFF;"><?php echo $emailMensagem;?></td>
    
  </tr>
  
  
<?php
}
?> 
  
</table>

    <form name="responderEmail" action="" enctype="multipart/form-data" method="post">
    
    <label>
       <span>Escreva e resposta:</span>
       <textarea  rows="8" cols="121" name="mensagem"></textarea>
    </label>
    
    <input type="hidden" name="emailId" value="<?php echo $emailId ;?>" />
    <input type="hidden" name="cliente-email" value="<?php echo $emailEmail;?>" />
    <input type="hidden" name="emailData" value="<?php echo $emailData;?>" />
    <input type="hidden" name="emailMensagem" value="<?php echo $emailMensagem;?>" />
    <input type="hidden" name="emailNome" value="<?php echo $emailNome;?>" />
    
    <input type="submit" name="executar" id="executar" value="Enviar Resposta" />

</form>

     </div>
   
   

            
   		</div>

	</div>
    
        <?php include_once("footer.php")?>
       
    