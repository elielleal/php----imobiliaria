<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <title>Faça seu Login - Eliel Imóveis</title>
</head>
<body>
    <div id="login">
        <img src="images/logoss.png" width="100" alt="" />
        <img class="usuario" src="images/Users-User-icon.png" width="30" alt="">
     <form name="login_painel" action="<?php echo $loginFormAction; ?>" method="POST">
     <span class="enviar">Informe seu E-mail para receber os dados 
         <p>de acesso</p>
     </span>
    <label><span> </span><input type="text" name="email" placeholder="Informe seu Email" /></label>
    
    <p><a href="index.php">[ Voltar e Logar ]</a><p>
    <input type="submit" name="logar" value="Logar" class="btn" />
    <div class="alertas">
      Enviamos seus dados de acesso para seu e-mail
  </div>
  </form>
  
    </div>
    
</body>
</html>