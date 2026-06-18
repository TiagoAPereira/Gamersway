<?php
include_once("config.php");
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
$user_id = $_GET['id'] ?? null;
if (!$user_id) {
    header("Location: admin_page.php");
    exit();
}

$user = get_user_by_id($user_id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Utilizador</title>
    <link rel='stylesheet' href='css/main.css' />
</head>
<body>
    <header class='site-header'>
        <div class='container'>
            <h1>Editar Utilizador: <?php echo $user['username']; ?></h1>
            <nav class='site-nav'>
                <?php nav_bar(); ?>
            </nav>
        </div>
    </header>
    <main class='container'>
        <section class='admin-panel'>
            <form method='POST' action='update_user.php' class='admin-form'>
                <input type='hidden' name='id' value='<?php echo $user['id_user']; ?>'>
                
                <label for='username'>Username:</label>
                <input type='text' id='username' name='username' value='<?php echo $user['username']; ?>' disabled>
                
                <label for='cargo'>Cargo:</label>
                <input type='text' inputmode='numeric' placeholder='0 ou 9' pattern='^(0|9)$' id='cargo' name='cargo' value='<?php echo $user['cargo']; ?>'>
                
                <label for='online'>Online:</label>
                <input type='checkbox' id='online' name='online' <?php echo ($user['online'] ? "checked" : ""); ?> disabled>
                
                <input type='submit' value='Atualizar'>
            </form>
            <p><a href='admin_page.php'>Voltar para o Painel de Administração</a></p>
        </section>
    </main>
    <footer class='site-footer'>
        <div class='container'>&copy; Gamersway</div>
    </footer>
</body>
</html>