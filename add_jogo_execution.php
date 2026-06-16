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
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $nome_jogo = $_POST['nome_jogo'];
                $link_site_jogo = $_POST['link_site_jogo'];
                $data_lancamento = $_POST['data_lancamento'];
                $rating = $_POST['rating'];
            }
            // Processar o upload da imagem
            if (isset($_FILES['imagem_jogo']) && $_FILES['imagem_jogo']['error'] === UPLOAD_ERR_OK) {
                $imagem_jogo = $_FILES['imagem_jogo']['name'];
                move_uploaded_file($_FILES['imagem_jogo']['tmp_name'], PASTA_IMGS . "/" . $imagem_jogo);
            } else {
                echo "<p>Erro ao fazer upload da imagem.</p>"; 
            }
            // Adicionar o jogo à base de dados
            add_jogo($nome_jogo, $link_site_jogo, $imagem_jogo, $data_lancamento, $rating);
            ?>
                <p>Jogo adicionado com sucesso! <a href='admin_page.php'>Voltar para o Painel de Administração</a></p>
        </section>
    </main>