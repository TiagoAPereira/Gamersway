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
            <nav class="site-nav">
                <?php nav_bar(); ?>
            </nav>
            <p class="tag">gestão de utilizadores, jogos e salas de chat</p>
        </div>
    </header>

    <main class="container">
<?php
if (user_logged_in() && is_admin()) {
    echo "<section class='admin-panel'>";
    echo "<p class='page-note'><strong>Gestão de utilizadores.</strong></p>";
    echo "<table border='1' class='admin-table'>";
    echo "<thead><tr><th>Username</th><th>Cargo*</th><th>Online</th></tr></thead>";
    echo "<tbody>";
    $users_info = get_users_info();
    foreach ($users_info as $user) {
        echo "<tr>";
        echo "<td>" . $user['username'] . "</td>";
        echo "<td>" . $user['cargo'] . "</td>";
        echo "<td>" . ($user['online'] ? "Sim" : "Não") . "</td>";
        echo "<td><a href='edit_user.php?id=" . $user['id_user'] . "'>Editar</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "<p class='page-note'><small>* 0-User, 9-Admin</small></p>";

    echo "<p class='page-note'><strong>Gestão de jogos.</strong></p>";
    echo "<table border='1' class='admin-table'>";
    echo "<thead><tr><th>Nome do Jogo</th><th>Link do Site</th><th>Imagem</th><th>Data de Lançamento</th><th>Rating*</th></tr></thead>";
    echo "<tbody>";
    $jogos = get_jogos();
    foreach($jogos as $jogo){
        echo "<tr>";
        echo "<td>" . $jogo['nome_jogo'] . "</td>";
        echo "<td>" . $jogo['link_site_jogo'] . "</td>";
        echo "<td><img width=\"100\" height=\"100\" src=\"" . PASTA_IMGS . "/" . $jogo['imagem_jogo'] . "\" alt=\"" . $jogo['nome_jogo'] . "\" /></td>";
        echo "<td>" . $jogo['data_lancamento'] . "</td>";
        echo "<td>" . $jogo['rating'] . "</td>";
        echo "<td><a href='edit_jogo.php?id=" . $jogo['id_jogo'] . "'>Editar</a></td>";
        echo "<td><a href='delete_jogo.php?id=" . $jogo['id_jogo'] . "' onclick=\"return confirm('Tem certeza que deseja excluir este jogo?');\">Excluir</a></td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    echo "<p class='page-note'><small>* Avaliação de 0 a 100(dados fictícios)</small></p>";
    echo "<p><a href='add_jogo_page.php'>Adicionar novo jogo</a></p>";
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