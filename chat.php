<?php
include 'config.php';
$username = get_username();
$ligacao = liga(); // Call the function and store the returned connection
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Gamersway — Chat</title>
    <link rel="stylesheet" href="css/main.css" />
    <style>body{background:linear-gradient(180deg,#071019 0%,#0b1220 100%);color:#e6eef6}</style>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Gamersway</h1>
            <nav class="site-nav">
                <?php nav_bar(); ?>
            <p class="tag">Community chat</p>
        </div>
    </header>

    <main class="container">
        <section class="chat-app" aria-live="polite">
            <div class="chat-header">
                <label>
                    Nome:
                    <?php
                    echo "<label id='username' aria-label='Username'>$username</label>";
                    ?>
                </label>
                <label style="margin-left:12px">
                    Sala: 
                    <?php
                    $nome_sala = mysqli_fetch_column(mysqli_query($ligacao, "select nome_sala from tbl_salas where id_sala = '1'"));
                    echo "<label id='room' aria-label='Room'>$nome_sala</label>";
                    ?>
                </label>
            </div>

            <div class="chat-main">
                <div class="chat-list" id="messages" aria-live="polite" aria-atomic="false">
                    <?php
                    $procura = "select * from tbl_mensagens where id_sala = '3' order by id_msg";
                    $resultado = mysqli_query($ligacao, $procura);
                    while($linha = mysqli_fetch_assoc($resultado)){
                        echo "<div class='chat-message'>";
                        $procura_autor = mysqli_query($ligacao, "select username from tbl_users where id_users = '".$linha["id_user"]."'");
                        $nome_autor = mysqli_fetch_column($procura_autor);
                        echo $nome_autor . ": " . $linha['mensagem'];
                        echo "</div>";
                    }
                    ?>
                </div>

                <aside class="chat-sidebar">
                    <h4 style="margin:0 0 8px 0">Membros</h4>
                    <ul id="peers"></ul>
                </aside>
            </div>

            <div class="chat-controls">
                <input id="message" class="chat-input" placeholder="Escreva uma mensagem e pressione Enter" aria-label="Message" />
                <button id="send" class="chat-send">Enviar</button>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">&copy; Gamersway — curated picks</div>
    </footer>

</body>
</html>
