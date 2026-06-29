<?php
include_once "config.php";
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_jogo = $_POST['id_jogo'];
    $nome_jogo = $_POST['nome_jogo'];
    $link_site_jogo = $_POST['link_site_jogo'];
    $data_lancamento = $_POST['data_lancamento'];
    $rating = $_POST['rating'];

    // Verificar se uma nova imagem foi enviada
    if (isset($_FILES['imagem_jogo']) && $_FILES['imagem_jogo']['error'] === UPLOAD_ERR_OK) {
        $imagem_jogo = $_FILES['imagem_jogo']['name'];
        move_uploaded_file($_FILES['imagem_jogo']['tmp_name'], PASTA_IMGS . "/" . $imagem_jogo);
    } else {
        // Manter a imagem atual se nenhuma nova imagem for enviada
        $jogo_atual = get_jogo_by_id($id_jogo);
        $imagem_jogo = $jogo_atual['imagem_jogo'];
    }

    update_jogo($id_jogo, $nome_jogo, $link_site_jogo, $imagem_jogo, $data_lancamento, $rating);

    header("Location: admin_page.php#games");
    exit();
}
?>