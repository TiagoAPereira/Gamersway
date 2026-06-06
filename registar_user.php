<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar utilizador</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Gamersway</h1>
            <nav class="site-nav">
                <?php nav_bar(); ?>
            <p class="tag">Registo</p>
        </div>
    </header>

    <main class="container">
        <section>
            <div class="card" style="padding:16px">
    <?php
    $username=$_POST['username'];
    $userpassword=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if(!$username){
        echo "<p class='meta'>Volte atrás e escreva um nome de utilizador!</p>";
        echo "<p><a href='signin.php'>Voltar para a página de registo</a></p>";
        exit;
    }
    if(!$userpassword){
        echo "<p class='meta'>Volte atrás e escreva uma palavra-passe!</p>";
        echo "<p><a href='signin.php'>Voltar para a página de registo</a></p>";
        exit;
    }
    if($userpassword != $confirm_password){
        echo "<p class='meta'>As palavras-passe não coincidem!</p>";
        echo "<p><a href='signin.php'>Voltar para a página de registo</a></p>";
        exit;
    }
    
    echo "<p> Nome do user desejado: $username </p>";
    echo "<p> Palavra-passe desejada: $userpassword </p>";

    $ligacao = liga(); // Call the function and store the returned connection


    $procura = "select * from tbl_users where BINARY username = '$username'";
    $resultado = mysqli_query($ligacao, $procura);
    $nregistos = mysqli_num_rows($resultado);

    if($nregistos == 0){
        // O nome de utilizador não existe, podemos criar o novo utilizador
        $inserir = "insert into tbl_users (username, password) values ('$username', '$userpassword')";
        mysqli_query($ligacao, $inserir);
        $inserir_sala = "insert into tbl_users_salas (id_sala, id_user) values ('1', (select id_user from tbl_users where BINARY username = '$username'))";
        mysqli_query($ligacao, $inserir_sala);
        echo "<p>Utilizador registado com sucesso!</p>";
        echo "<p><a href='index.php'>Voltar para a página inicial</a></p>";
    }
    else{
        // O nome de utilizador já existe, mostrar mensagem de erro
        $registo = mysqli_fetch_assoc($resultado);
        echo "<p> Nome de utilizador já existe: $username!</p>";
        echo "<p><a href='signin.php'>Voltar para a página de registo</a></p>";
    }
    ?>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">&copy; Gamersway</div>
    </footer>
</body>
</html>