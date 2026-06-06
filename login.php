<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Gamersway</h1>
            <nav class="site-nav">
                <?php nav_bar(); ?>
            <p class="tag">Login</p>
        </div>
    </header>

    <main class="container">
        <section>
            <div class="card" style="max-width:420px;margin:0 auto;padding:18px">
                <form action="validaruser.php" method="post">
                    <label class="meta">Nome de utilizador</label>
                    <input name="login" id="login" placeholder="Escreva o seu nome de utilizador" aria-label="Login" />
                    <label class="meta">Palavra-passe</label>
                    <input name="password" id="password" type="password" placeholder="Escreva a sua palavra-passe" aria-label="Password" />
                    <div style="margin-top:12px;display:flex;gap:8px;align-items:center;justify-content:space-between">
                        <input type="submit" value="Login" class="chat-send" />
                        <div style="font-size:13px"><a href="signin.php">Não tem conta? Registe-se</a></div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">&copy; Gamersway</div>
    </footer>
</body>
</html>