<?php
// *** Logout the current user.
$logoutGoTo = "";
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['MM_Username'] = NULL;
$_SESSION['MM_UserGroup'] = NULL;
unset($_SESSION['MM_Username']);
unset($_SESSION['MM_UserGroup']);
if ($logoutGoTo != "") {header("Location: $logoutGoTo");
exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="login_style.css">
    <title>Faça seu Login - Eliel Imóveis</title>
</head>
<body>
    <div id="login">
        <img id="rest" src="images/logoss.png" width="100" alt="" />
        <span class="restrito">
            <strong>Você deslogou com sucesso!!!</strong><br>
        </span>

        <div class="link">
            <a href="index.php">Logar</a>
            <a href="../">Voltar ao site</a>
        </div>
    </div>
    
</body>
</html>