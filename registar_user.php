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
    $username=$_POST['username'];
    $userpassword=$_POST['password'];
    if(!$userpassword){
        echo "Volte atrás e escreva uma palavra-passe!";
        exit;
    }
    if(!$userlogin){
        echo "Volte atrás e escreva um nome de utilizador!";
        exit;
    }
    echo "<p> Nome do user desejado: $username </p>";
    echo "<p> Palavra-passe desejada: $userpassword </p>";

    $liga = liga(); // Call the function and store the returned connection


    $procura = "select * from tbl_users where BINARY username = '$username'";
    $resultado = mysqli_query($liga, $procura);
    $nregistos = mysqli_num_rows($resultado);

    if($nregistos == 0){
        $inserir = "insert into tbl_users (username, password) values ('$username', '$userpassword')";
        exit;
    }
    else{
        $registo = mysqli_fetch_assoc($resultado);
        echo "<p> Nome de utilizador já existe: $username!</p>";
        echo "<a href='signin.php'>Voltar para a página de registo</a>";
    }
    ?>

</body>
</html>