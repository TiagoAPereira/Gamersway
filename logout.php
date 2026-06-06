<?php
include_once 'config.php';
$user_logado = user_logged_in();
if($user_logado){
    $ligacao = liga();
    $update_user_offline = "update tbl_users set online = 0 where username = '" . get_username() . "'";
    mysqli_query($ligacao, $update_user_offline);
    session_unset();
    session_destroy();
    $message = 'Sessão terminada com sucesso.';
} else {
    $message = 'Nenhum utilizador está atualmente ligado.';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Logout</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Gamersway</h1>
            <nav class="site-nav">
                <?php nav_bar(); ?>
            <p class="tag">Logout</p>
        </div>
    </header>

    <main class="container">
        <section>
            <div class="card" style="padding:16px;max-width:600px;margin:0 auto;text-align:center">
                <p><?php echo $message; ?></p>
                <p><a href="index.php">Voltar para a página inicial</a></p>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">&copy; Gamersway</div>
    </footer>
</body>
</html>