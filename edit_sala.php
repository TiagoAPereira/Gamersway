<?php
include_once("config.php");
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
$sala_id = $_GET['id'] ?? null;
if (!$sala_id) {
    header("Location: admin_page.php");
    exit();
}
$sala = get_sala_by_id($sala_id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sala</title>
    <link rel='stylesheet' href='css/main.css' />
</head>
<body>
    <header class='site-header'>
        <div class='container'>
            <h1>Editar Sala: <?php echo $sala['nome_sala']; ?></h1>
            <nav class='site-nav'>
                <?php nav_bar(); ?>
            </nav>
        </div>
    </header>
    <main class='container'>
        <section class='admin-panel'>
            <form action="update_sala.php" method="POST">
                <input type="hidden" name="id" value="<?= $sala['id_sala'] ?>">
                <label for="nome_sala">Nome da Sala:</label>
                <input type="text" name="nome_sala" id="nome_sala" value="<?= $sala['nome_sala'] ?>" required>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" required><?= $sala['descricao'] ?></textarea>
                <button type="submit">Atualizar Sala</button>
            </form>
            <p><a href='admin_page.php'>Voltar para o Painel de Administração</a></p>
        </section>
    </main>
    <footer class='site-footer'>
        <div class='container'>&copy; Gamersway</div>
    </footer>
</body>