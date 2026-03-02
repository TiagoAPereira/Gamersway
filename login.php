<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Login</title>
</head>
<body>
    <div>
        <form action="validaruser.php" method="post">
        <input name="login" id="login"  placeholder="Escreva o seu nome de utilizador" aria-label="Login" />
        <input name="password" id="password"  placeholder="Escreva a sua palavra-passe" aria-label="Password" />
        <input type="submit" value="Login" />
        </form>
    </div>
    <a href="signin.php">Não tem conta? Registe-se aqui</a>
    <a href="index.php">Voltar para a página inicial</a>
</body>
</html>