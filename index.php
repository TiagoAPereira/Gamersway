<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Gamersway</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <?php
// Set session variables
if(!isset($_SESSION["user_logged_in"])){  
    $_SESSION["user_logged_in"] = "false";
}
?>
    <header class="site-header">
        <div class="container">
            <h1>Gamersway</h1>
            <nav class="site-nav">
                <?php nav_bar(); ?>
            <p class="tag">Best games of the week &amp; year — curated picks</p>
        </div>
    </header>

    <main class="container">
        <section class="controls">
            <!-- 
            <div class="left-controls">
                <div class="btn-group">
                    <button id="btn-week" class="active">Best of Week</button>
                    <button id="btn-year">Best of Year</button>
                </div> 
                <input id="search" placeholder="Search games" aria-label="Search games" />
            </div> 
            -->

            <div class="filters">
                <!--
                <label>
                    Platform
                    <select id="platform">
                        <option value="all">All</option>
                    </select>
                </label>

                <label>
                    Min Rating
                    <div class="range-wrap"><input id="min-rating" type="range" min="0" max="10" step="0.1" value="0" /><span id="rating-value">0</span></div>
                </label>

                <label>
                    Sort
                    <select id="sort">
                        <option value="rating-desc">Rating (high → low)</option>
                        <option value="rating-asc">Rating (low → high)</option>
                        <option value="title-asc">Title (A → Z)</option>
                    </select>
                </label>
            -->
                <form id="num-games-form" style="display:inline" method="POST" action="index.php">
                    
                    <select name="num-games" id="num-games" aria-label="Nº de jogos" style="margin-left:12px ; color:#333 ; background-color: #fff;">
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                    </select>
                    <button type="submit">Show</button>
                </form>
            </div>
        </section>

            <div id="games-list"  class="games-list">
            <?php 
            if(isset($_POST['num-games'])){
                $num_games = intval($_POST['num-games']);
            } else {
                $num_games = 3; // Default value
            }
            echo "<table>";
            echo "<tr><th>Imagem</th><th>Nome</th><th>Avaliação</th><th>Link</th></tr>";
            echo "<tr><td colspan=" . $num_games . "><hr></td></tr>";
            $jogos = get_top_jogos($num_games);
            foreach($jogos as $jogo){
                echo "<tr>";
                echo "<td><img width=\"100\" height=\"100\" src=\"" . PASTA_IMGS . "/" . $jogo['imagem_jogo'] . "\" alt=\"" . $jogo['nome_jogo'] . "\" /></td>";
                echo "<td><h3>" . $jogo['nome_jogo'] . "</h3></td>";
                echo "<td><p>Avaliação: " . $jogo['rating'] . "</p></td>";
                echo "<td><a href=\"" . $jogo['link_site_jogo'] . "\" target=\"_blank\">Ver Detalhes</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
            </div>

    </main>

    <footer class="site-footer">
        <div class="container">&copy; Gamersway — curated picks</div>
    </footer>
</body>
</html>