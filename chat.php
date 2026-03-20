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
                    if(isset($_POST['sala'])){
                        echo "<p style='margin:0 0 0 12px'>Sala selecionada: " . $_POST['sala'] . "</p>";
                    }
                    else {
                       $sala_selecionada = mysqli_fetch_column(mysqli_query($ligacao, "select nome_sala from tbl_salas where id_sala = '1'"));
                       echo "<p>$sala_selecionada</p>";
                    }
                    ?>
                </label>
                <label style="margin-left:12px">
                    Sala: 
                    <?php
                    $procura_sala = mysqli_query($ligacao, "select nome_sala from tbl_salas");
                    $nome_salas = mysqli_fetch_all($procura_sala, MYSQLI_ASSOC);
                    echo "<form name='room-form' id='room-form' style='display:inline' method='POST' action='chat.php'>";
                    echo "<select name='sala' id='room' aria-label='Chat Room'>";
                   // echo "<option selected value= '$sala_selecionada'>" . $_POST['sala'] . "</option>";
                    foreach($nome_salas as $sala){
                        if($sala['nome_sala'] == $_POST['sala']){
                            echo "<p>****</p>";
                            echo "<option selected name='sala' id='" . $sala['nome_sala'] . "' value='" . $sala['nome_sala'] . "'>" . $sala['nome_sala'] . "</option>";
                        }
                        else {
                            echo "<option name='sala' id='" . $sala['nome_sala'] . "' value='" . $sala['nome_sala'] . "'>" . $sala['nome_sala'] . "</option>";
                        }
                    }
                    echo "</select>";
                    echo "<button id='enter-room' type='submit' style='margin-left:8px'>Entrar</button>";
                    echo "</form>";
                    if(isset($_POST['sala'])){
                        $sala_selecionada = $_POST['sala'];
                    } else {
                        $sala_selecionada = $nome_salas[0]['nome_sala'];
                    }

                    ?>

                </label>
            </div>

            <div class="chat-main">
                <div class="chat-list" id="messages" aria-live="polite" aria-atomic="false">
                    <?php
                    $procura = "select * from tbl_mensagens where id_sala = (select id_sala from tbl_salas where nome_sala = '$sala_selecionada') order by id_msg";
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
