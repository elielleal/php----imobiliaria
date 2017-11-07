<div id="pagina">
   
  <div class="anuncie_ok">
  
  <h1> Veja abaixo os dados </h1>
  
  <?php
  	
	$criadoEM = date ('Y-m-d H:i:s');
	$modificadoEM = date ('Y-m-d H:i:s');
	$clienteNivel = 'cliente';
	$clienteStatus = 'pendente';
  	
  
  	$clienteNome = strip_tags(trim($_POST['nome']));
	$clienteSenha = strip_tags(trim(md5($_POST['senha'])));
	$clienteSenha_mail = strip_tags(trim($_POST['senha']));
	$clienteEmail = strip_tags(trim($_POST['email']));
	
	$sql_verificaMail = 'SELECT email FROM eliel_clientes WHERE email = :clienteEmail';
	
	
	try{
$query_verificaMail = $conecta -> prepare($sql_verificaMail);
$query_verificaMail -> bindValue(':clienteEmail', $clienteEmail, PDO::PARAM_STR);
$query_verificaMail -> execute();
$count_verificaMail = $query_verificaMail->rowCount(PDO::FETCH_ASSOC);

}

catch(PDOexception $error_verificaMail){
echo 'Erro ao selecionar verificador';
}

if($count_verificaMail >= '1'){
	echo '<h2>Desculpe, o e-mail informado já está cadastrado!!</h2>
	<p>Não foi possível realizar seu cadastro com este e-mail</p>';
}
else{
	
	
	$clienteTelefone= strip_tags(trim($_POST['telefone']));
	
	$sql_cadastraCliente = 'INSERT INTO eliel_clientes(criadoEM, modificadoEM, clienteStatus, usuarioNivel, nome, email, senha, telefone)';
	$sql_cadastraCliente .= 'VALUES (:criadoEM, :modificadoEM, :clienteStatus, :usuarioNivel, :nome, :email, :senha, :telefone)';
	
	try{
		
$query_cadastraCliente = $conecta -> prepare($sql_cadastraCliente);
$query_cadastraCliente -> bindvalue(':criadoEM', $criadoEM, PDO::PARAM_STR);
$query_cadastraCliente -> bindvalue(':modificadoEM', $modificadoEM, PDO::PARAM_STR);
$query_cadastraCliente-> bindvalue(':clienteStatus', $clienteStatus, PDO::PARAM_STR);
$query_cadastraCliente -> bindvalue(':usuarioNivel', $clienteNivel, PDO::PARAM_STR);
$query_cadastraCliente -> bindvalue(':nome', $nome, PDO::PARAM_STR);
$query_cadastraCliente -> bindvalue(':email', $email, PDO::PARAM_STR);
$query_cadastraCliente -> bindvalue(':senha', $senha, PDO::PARAM_STR);
$query_cadastraCliente -> bindvalue(':telefone', $telefone, PDO::PARAM_STR);
$query_cadastraCliente -> execute();

$mail_data = date('d/m/Y H:i:s');
$meuEmail = 'eliel_leal_13@hotmail.com.br';
$assunto = 'Novo Cliente cadastrado '.$clienteNome;
$headers = "From: $meuEmail\n";
$headers .= "content-type: text/html; 
charset=\"utf-8\"\n\n";
$mensagemSistema = "Novo Cliente Cadastrado:<br>
<strong>Cliente Nome:</strong>$clienteNome<br>
<strong>Cliente E-mail:</strong>$clienteEmail<br>
Mensagem Enviada em: $mail_data";
mail($meuEmail, $assunto, $mensagemSistema, $headers);
$clienteAssunto = 'Cadastro efetuado com sucesso Eliel Imóveis';
$mensagemCliente = " 
<strong> Email de segurança, guarde este e-mail para consulta!</strong><br>
Seus dados são: <br> <br> 
Login:$clienteEmail<br>
Senha:$clienteSenha_mail<br><br>
Seu Cadastro foi criado em $criadoEM! <br> <br>
Esta é uma mensagem automática de nosso sistema, você não precisa responder! <br><br>
Mensagem enviada em: $mail_data";

mail($clienteEmail, $clienteAssunto, $mensagemCliente, $headers);



echo ' <h2> Cadastro com Sucesso</h2>
    
    <p>Seu cadastro foi realizado com sucesso! Para começar anunciar <a href="admin/index.php">CLIQUE AQUI</a><br /> ou efetue login na central do anunciante</p>
    
    <p>Por segurança enviamos uma cópia de seu cadastro por e-mail<strong>'.$clienteEmail.'</strong></p>
    ';	
		
	}
	catch(PDOexception $error_cadastro){
echo '<h2> Erro ao Cadastrar, por favor tente novamente ou nos envie um e-mail informando </h2> ';
}
}
  ?>
  
  	
    
   
    
  </div>
   
</div><!--fecha pagina-->    
     
