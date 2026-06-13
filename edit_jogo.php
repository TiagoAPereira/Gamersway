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
echo "<h1>Editar Jogo: " . $jogo['nome_jogo'] . "</h1>";
echo "<form method='POST' action='update_jogo.php' enctype='multipart/form-data'>";
echo "<input type='hidden' name='id_jogo' value='" . $jogo['id_jogo'] . "' />";
echo "<label for='nome_jogo'>Nome do Jogo:</label><br>";
echo "<input type='text' id='nome_jogo' name='nome_jogo' value='" . $jogo['nome_jogo'] . "' /><br><br>";
echo "<label for='link_site_jogo'>Link do Site do Jogo:</label><br>";
echo "<input type='text' id='link_site_jogo' name='link_site_jogo' value='" . $jogo['link_site_jogo'] . "' /><br><br>";
echo "<label for='imagem_jogo'>Imagem do Jogo:</label><br>";
echo "<input type='file' id='imagem_jogo' name='imagem_jogo' /><br><br>";
echo "<label for='data_lancamento'>Data de Lançamento:</label><br>";
echo "<input type='date' id='data_lancamento' name='data_lancamento' value='" . $jogo['data_lancamento'] . "' /><br><br>";
echo "<label for='rating'>Rating:</label><br>";
echo "<input type='number' id='rating' name='rating' min='0' max='100' value='" . $jogo['rating'] . "' /><br><br>";
echo "<input type='submit' value='Atualizar Jogo' />";
echo "</form>";
?>