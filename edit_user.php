<?php
include_once("config.php");
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
$user_id = $_GET['id'] ?? null;
if (!$user_id) {
    header("Location: admin_page.php");
    exit();
}

$user = get_user_by_id($user_id);
echo "<h1>Editar Utilizador: " . $user['username'] . "</h1>";
echo "<form method='POST' action='update_user.php'>";
echo "<input type='hidden' name='id' value='" . $user['id_user'] . "'>";
echo "<label for='username'>Username:</label>";
echo "<input type='text' id='username' name='username' value='" . $user['username'] . "' disabled>";
echo "<label for='cargo'>Cargo:</label>";
echo "<input type='text' inputmode='numeric' placeholder='0 ou 9' pattern='^(0|9)$' id='cargo' name='cargo' value='" . $user['cargo'] . "'>";
echo "<label for='online'>Online:</label>";
echo "<input type='checkbox' id='online' name='online' " . ($user['online'] ? "checked" : "") . " disabled>";

echo "<input type='submit' value='Atualizar'>";
echo "</form>";
?>