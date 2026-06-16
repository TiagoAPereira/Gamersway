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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Jogo</title>
 <link rel='stylesheet' href='css/main.css' />
</head>
<body>
    <header class='site-header'>
        <div class='container'>
            <h1>Adicionar Novo Jogo</h1>
            <nav class='site-nav'>
                <?php nav_bar(); ?>
            </nav>
        </div>
    </header>
    <main class='container'>
        <section class='admin-panel'>
            <form action='add_jogo_execution.php' method='POST' enctype='multipart/form-data' class='admin-form'>
                <label for='nome_jogo'>Nome do Jogo:</label>
                <input type='text' id='nome_jogo' name='nome_jogo' required />

                <label for='link_site_jogo'>Link do Site do Jogo:</label>
                <input type='url' id='link_site_jogo' name='link_site_jogo' required />

                <label for='imagem_jogo'>Imagem do Jogo:</label>
                <input type='file' id='imagem_jogo' name='imagem_jogo' accept='image/*' required />

                <label for='data_lancamento'>Data de Lançamento:</label>
                <input type='date' id='data_lancamento' name='data_lancamento' required />

                <label for='rating'>Rating (0-100):</label>
                <input type='number' id='rating' name='rating' min='0' max='100' step='1' required />

                <button type='submit'>Adicionar Jogo</button>
            </form>
            <p><a href='admin_page.php'>Voltar para o Painel de Administração</a></p>
        </section>
    </main>
</body>
</html>