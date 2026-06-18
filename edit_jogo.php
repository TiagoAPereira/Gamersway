<?php
include_once "config.php";
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
$jogo_id = $_GET['id'] ?? null;
if (!$jogo_id) {
    header("Location: admin_page.php");
    exit();
}
$jogo = get_jogo_by_id($jogo_id);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
    <link rel='stylesheet' href='css/main.css' />
</head>
<body>
    <header class='site-header'>
        <div class='container'>
            <h1>Editar Jogo: <?php echo $jogo['nome_jogo']; ?></h1>
            <nav class='site-nav'>
                <?php nav_bar(); ?>
            </nav>
        </div>
    </header>
    <main class='container'>
        <section class='admin-panel'>
            <form method='POST' action='update_jogo.php' enctype='multipart/form-data' class='admin-form'>
                <input type='hidden' name='id_jogo' value='<?php echo $jogo['id_jogo']; ?>' />
                
                <label for='nome_jogo'>Nome do Jogo:</label>
                <input type='text' id='nome_jogo' name='nome_jogo' value='<?php echo $jogo['nome_jogo']; ?>' />
                
                <label for='link_site_jogo'>Link do Site do Jogo:</label>
                <input type='url' id='link_site_jogo' name='link_site_jogo' value='<?php echo $jogo['link_site_jogo']; ?>' />
                
                <label for='imagem_jogo'>Imagem do Jogo:</label>
                <input type='file' id='imagem_jogo' name='imagem_jogo' />
                
                <label for='data_lancamento'>Data de Lançamento:</label>
                <input type='date' id='data_lancamento' name='data_lancamento' value='<?php echo $jogo['data_lancamento']; ?>' />
                
                <label for='rating'>Rating (0-100):</label>
                <input type='number' id='rating' name='rating' min='0' max='100' value='<?php echo $jogo['rating']; ?>' />
                
                <input type='submit' value='Atualizar Jogo' />
            </form>
            <p><a href='admin_page.php'>Voltar para o Painel de Administração</a></p>
        </section>
    </main>
    <footer class='site-footer'>
        <div class='container'>&copy; Gamersway</div>
    </footer>
</body>
</html>