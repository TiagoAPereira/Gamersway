<?php
include_once("config.php");
if (!user_logged_in() || !is_admin()) {
    header("Location: index.php");
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $cargo = $_POST['cargo'] ?? null;
    
    if ($cargo !== '9') { 
        $cargo = '0'; // Se o cargo não for 9, definir como 0
    }
    update_user($id, $cargo);
    header("Location: admin_page.php");
    exit();
}

?>
