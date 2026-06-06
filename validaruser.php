<?php
include_once 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    

    <?php
    $user_login=$_POST['login'];
    $user_password=$_POST['password'];
    if(!$user_password){
        echo "Volte atrás e escreva uma palavra-passe!";
        echo "<a href='login.php'>Voltar para a página de login</a>";
        exit;
    }
    if(!$user_login){
        echo "Volte atrás e escreva um nome de utilizador!";
        echo "<a href='login.php'>Voltar para a página de login</a>";
        exit;
    }
    echo "<p> Nome do user: $user_login </p>";
    echo "<p> Palavra-passe do user: $user_password </p>";

    $ligacao = liga(); // Call the function and store the returned connection


    $procura = "select * from tbl_users where BINARY username = '$user_login'";
    $resultado = mysqli_query($ligacao, $procura);
    $nregistos = mysqli_num_rows($resultado);

    if($nregistos == 0){
        echo "<p> Nome de utilizador inválido: $user_login!</p>";
        echo "<a href='login.php'>Voltar para a página de login</a>";
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
            echo "<a href='index.php'>Voltar para a página inicial</a>";
        } else {
            echo "<p>Password incorreta!</p>";
            echo "<a href='login.php'>Voltar para a página de login</a>";
        }
    }
    ?>

</body>
</html>