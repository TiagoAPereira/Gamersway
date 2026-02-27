<?php
include 'config.php';
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
    $userlogin=$_POST['login'];
    $userpassword=$_POST['password'];
    if(!$userpassword){
        echo "Volte atrás e escreva uma palavra-passe!";
        exit;
    }
    if(!$userlogin){
        echo "Volte atrás e escreva um nome de utilizador!";
        exit;
    }
    echo "<p> Nome do user: $userlogin </p>";
    echo "<p> Palavra-passe do user: $userpassword </p>";

    $liga = liga(); // Call the function and store the returned connection


    $procura = "select * from tbl_users where BINARY username = '$userlogin'";
    $resultado = mysqli_query($liga, $procura);
    $nregistos = mysqli_num_rows($resultado);

    if($nregistos == 0){
        echo "<p> Nome de utilizador inválido: $userlogin!</p>";
        echo "<a href='login.php'>Voltar para a página de login</a>";
        exit;
    }
    else{
        $registo = mysqli_fetch_assoc($resultado);
        if($userpassword == $registo['password']){
            echo "<p>A password está correta!</p>";
            $_SESSION["user_logged_in"] = "true";
            echo "<a href='index.php'>Voltar para a página inicial</a>";
        } else {
            echo "<p>Password incorreta!</p>";
            echo "<a href='login.php'>Voltar para a página de login</a>";
        }
    }
    ?>

</body>
</html>