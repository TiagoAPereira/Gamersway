<?php
include_once "config.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Painel de Administração</h1>
            <p class="tag">gestão de utilizadores, jogos e salas de chat</p>
        </div>
    </header>

    <main class="container">
<?php
if (user_logged_in() && is_admin()) {
    echo "<section class='admin-panel'>";
    echo "<p class='page-note'>Gestão de utilizadores.</p>";
    echo "<table class='admin-table'>";
    echo "<thead><tr><th>Username</th><th>Cargo</th><th>Online</th></tr></thead>";
    echo "<tbody>";
    $users_info = get_users_info();
    foreach ($users_info as $user) {
        echo "<tr>";
        echo "<td>" . $user['username'] . "</td>";
        echo "<td>" . $user['cargo'] . "</td>";
        echo "<td>" . ($user['online'] ? "Sim" : "Não") . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "<p class='page-note'><small>* 0-User, 9-Admin</small></p>";
    echo "<p><a href='index.php'>Voltar para a página inicial</a></p>";
    echo "</section>";
} else {
    echo "<section class='admin-panel'>";
    echo "<h1>Acesso Negado</h1>";
    echo "<p>Você não tem permissão para acessar esta página.</p>";
    echo "<p><a href='index.php'>Voltar para a página inicial</a></p>";
    echo "</section>";
}
?>
    </main>

    <footer class="site-footer">
        <div class="container">&copy; Gamersway — curated picks</div>
    </footer>
</body>
</html>