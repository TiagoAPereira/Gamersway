<?php
include_once("config.php");
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
if (isset($_GET['id'])) {
    $id_sala = $_GET['id'];
    delete_sala($id_sala);
    header("Location: admin_page.php");
    exit();
} else {
    echo "<p>ID da sala não especificado.</p>";
}
?>