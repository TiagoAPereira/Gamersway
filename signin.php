<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Sign in</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Gamersway</h1>
            <nav class="site-nav">
                <?php nav_bar(); ?>
            <p class="tag">Registo de utilizador</p>
        </div>
    </header>

    <main class="container">
        <section>
            <div class="card" style="max-width:480px;margin:0 auto;padding:18px">
                <form action="registar_user.php" method="post">
                    <label class="meta">Nome de utilizador</label>
                    <input name="username" id="username" placeholder="Escreva o nome de utilizador desejado" aria-label="username" />
                    <label class="meta">Palavra-passe</label>
                    <input name="password" id="password" type="password" placeholder="Escreva a palavra-passe desejada" aria-label="Password" />
                    <label class="meta">Confirmar palavra-passe</label>
                    <input name="confirm_password" id="confirm_password" type="password" placeholder="Confirme a palavra-passe desejada" aria-label="Confirm Password" />
                    <div style="margin-top:12px;display:flex;justify-content:flex-end">
                        <input type="submit" value="Registar" class="chat-send" />
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