<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registar user</title>
</head>
<body>

    

    <?php
    $username=$_POST['username'];
    $userpassword=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    if(!$username){
        echo "Volte atrás e escreva um nome de utilizador!";
        echo "<a href='signin.php'>Voltar para a página de registo</a>";
        exit;
    }
    if(!$userpassword){
        echo "Volte atrás e escreva uma palavra-passe!";
        echo "<a href='signin.php'>Voltar para a página de registo</a>";
        exit;
    }
    if($userpassword != $confirm_password){
        echo "As palavras-passe não coincidem!";
        echo "<a href='signin.php'>Voltar para a página de registo</a>";
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
        $inserir_sala = "insert into tbl_users_salas (id_sala, id_user) values ('1', (select id_users from tbl_users where BINARY username = '$username'))";
        mysqli_query($ligacao, $inserir_sala);
        echo "<p>Utilizador registado com sucesso!</p>";
        echo "<a href='index.php'>Voltar para a página inicial</a>";
    }
    else{
        // O nome de utilizador já existe, mostrar mensagem de erro
        $registo = mysqli_fetch_assoc($resultado);
        echo "<p> Nome de utilizador já existe: $username!</p>";
        echo "<a href='signin.php'>Voltar para a página de registo</a>";
    }
    ?>

</body>
</html>