<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Login</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <header class="site-header">
        <div class="container">
            <h1>Gamersway</h1>
            <nav class="site-nav">
                <?php nav_bar(); ?>
            <p class="tag">Validação de Login</p>
        </div>
    </header>

    <main class="container">
        <section>
            <div class="card" style="padding:16px">
    <?php
    $user_login=$_POST['login'];
    $user_password=$_POST['password'];
    if(!$user_password){
        echo "<p class='meta'>Volte atrás e escreva uma palavra-passe!</p>";
        echo "<p><a href='login.php'>Voltar para a página de login</a></p>";
        exit;
    }
    if(!$user_login){
        echo "<p class='meta'>Volte atrás e escreva um nome de utilizador!</p>";
        echo "<p><a href='login.php'>Voltar para a página de login</a></p>";
        exit;
    }
    echo "<p> Nome do user: $user_login </p>";
    echo "<p> Palavra-passe do user: $user_password </p>";

    $ligacao = liga(); // Call the function and store the returned connection


    $procura = "select * from tbl_users where BINARY username = '$user_login'";
    $resultado = mysqli_query($ligacao, $procura);
    $nregistos = mysqli_num_rows($resultado);

    if($nregistos == 0){
        echo "<p class='meta'> Nome de utilizador inválido: $user_login!</p>";
        echo "<p><a href='login.php'>Voltar para a página de login</a></p>";
        exit;
    }
    else{
        $registo = mysqli_fetch_assoc($resultado);
        if($user_password == $registo['password']){
            echo "<p>A password está correta!</p>";
            $_SESSION["user_logged_in"] = "true";
            $_SESSION["user_login"] = $user_login;
            $update_user_online = "update tbl_users set online = 1 where id_user = " . $registo['id_user'];
            mysqli_query($ligacao, $update_user_online);
            echo "<p><a href='index.php'>Voltar para a página inicial</a></p>";
        } else {
            echo "<p>Password incorreta!</p>";
            echo "<p><a href='login.php'>Voltar para a página de login</a></p>";
        }
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