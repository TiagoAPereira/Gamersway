<?php
include_once("config.php");
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sala = $_POST['id'] ?? null;
    $nome_sala = $_POST['nome_sala'] ?? null;
    $descricao = $_POST['descricao'] ?? null;

    if ($id_sala && $nome_sala && $descricao) {
        update_sala($id_sala, $nome_sala, $descricao);
        header("Location: admin_page.php#chat-salas");
        exit();
    } else {
        echo "<p>Todos os campos são obrigatórios.</p>";
    }
}
?>