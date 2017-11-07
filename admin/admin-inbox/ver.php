<?php include_once("sistema/restrito_admin.php")?>
<?php include_once("sistema/validar_user.php")?>
<?php include_once("header.php")?>
    
    
   
    <div id="local">
   <div class="caminho">Onde Estou: Eliel Imóveis &raquo; Painel de Controle &raquo; Admin de perfil &raquo; Visualizar E-mails
   </div><!--caminho-->
   <div class="welcome">Olá <?php echo $clienteNome; ?>, bem vindo!! <?php echo date('d/m/Y H:i').'h'; ?> | <a href="deslogar.php">Deslogar</a></div>
</div>
    
    
         
    
    <div id="content">
    
      <?php include_once("menu.php")?>
    

	   <div id="content_conteudo">
   
 
   <?php include_once("sistema/carregando.php");?>
   
   
   
   
      <div class="inbox">

<table width="100%" border="0" cellspacing="2" cellpadding="0">
  <tr style="background:#666; color:#FFF; font:12px Arial, Helvetica, sans-serif; font-weight:bold;">
    <td align="center">DATA:</td>
      <td align="center">RESPOSTA:</td>
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
    <td align="center"><?php echo date('d/m/y',strtotime($emailResposta));?>h</td>
    <td align="center"><?php echo $emailNome;?></td>
    <td align="center"><?php echo $emailEmail;?></td>
    <td align="center"><a href="painel.php?exe=admin-inbox/completos">Voltar</a></td>
  </tr>
  
   <tr>
    <td align="center" style="background:#CCC; color:#333; font:12px Arial, Helvetica, sans-serif; font-weight:bold;">MENSAGEM:</td>
    <td colspan="3" style="font:14px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#FFF;"><?php echo $emailMensagem;?></td> </tr>
    
    <tr>
    
     <td align="center" style="background:#CCC; color:#333; font:12px Arial, Helvetica, sans-serif; font-weight:bold;">Resposta:</td>
    <td colspan="3" style="font:14px 'Trebuchet MS', Arial, Helvetica, sans-serif; color:#FFF;"><?php echo $emailTxt;?></td>
    
  </tr>
  
<?php
}
?> 
  
</table>



     </div>
   
   

            
   		</div>

	</div>
    
        <?php include_once("footer.php")?>