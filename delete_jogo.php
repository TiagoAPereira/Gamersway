<?php
include_once "config.php";

if (isset($_GET['id'])) {
    $id_jogo = $_GET['id'];
    delete_jogo($id_jogo);
    header("Location: admin_page.php");
    exit();
} else {
    echo "<p>ID do jogo não especificado.</p>";
}
?>