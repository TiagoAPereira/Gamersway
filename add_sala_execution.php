<?php
include_once("config.php");
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
if ($_POST['nome_sala'] && $_POST['descricao']) {
    $nome_sala = $_POST['nome_sala'];
    $descricao = $_POST['descricao'];

    add_sala($nome_sala, $descricao);
    header("Location: admin_page.php?message=Sala adicionada com sucesso!");
    exit();
} else {
    echo "Por favor, preencha todos os campos.";
}
?>