<?php
// Start the session
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Sign in</title>
</head>
<body>
    <div>
        <form action="registar_user.php" method="post">
            <input name="username" id="username"  placeholder="Escreva o nome de utilizador desejado" aria-label="username" />
            <input name="password" id="password"  placeholder="Escreva a palavra-passe desejada" aria-label="Password" />
            <input type="submit" value="Sign in" />
        </form>
    </div>
    <a href="index.php">Voltar para a página inicial</a>
</body>
</html>