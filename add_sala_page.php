<?php
include_once("config.php");
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adicionar Sala</title>
        <link rel='stylesheet' href='css/main.css' />
    </head>
    <body>
        <header class='site-header'>
            <div class='container'>
                <h1>Adicionar Nova Sala</h1>
                <nav class='site-nav'>
                    <?php nav_bar(); ?>
                </nav>
            </div>
        </header>
        <main class='container'>
            <section class='admin-panel'>
                <form action="add_sala_execution.php" method="post" class='admin-form'>
                    <label for="nome_sala">Nome da Sala:</label>
                    <input type="text" id="nome_sala" name="nome_sala" required>
                    <br><br>
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao"></textarea>
                    <br><br>
                    <input type="submit" value="Adicionar Sala">
                </form>
                <p><a href='admin_page.php'>Voltar para o Painel de Administração</a></p>
            </section>
        </main>
        <footer class='site-footer'>
            <div class='container'>
                <p>&copy; Gamersway</p>
            </div>
        </footer>
    </body>
</html>