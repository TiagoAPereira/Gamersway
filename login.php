<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    // Configuração da ligação ao servidor
    $liga = mysqli_connect('localhost', 'root');

    // Verificação da ligação
    if (!$liga) {
        echo "<h2> ERRO!!! Falha na ligação ao Servidor! </h2>";
        exit;
    }

    // Ligação à base de dados Loja
    mysqli_select_db($liga, 'bd_gamersway');

    $procura = "select * from tbl_users where BINARY username = '$userlogin'";
    $resultado = mysqli_query($liga, $procura);
    $nregistos = mysqli_num_rows($resultado);

    ?>
    
    <?php
    if($nregistos == 0){
        echo "<p> Nome de utilizador inválido: $userlogin!</p>";
        echo "<a href='login.html'>Voltar para a página de login</a>";
        exit;
    }
    else{
        $registo = mysqli_fetch_assoc($resultado);
        if($userpassword == $registo['password']){
            echo "<p>A password está correta!</p>";
            echo "<a href='index.html'>Voltar para a página inicial</a>";
        } else {
            echo "<p>Password incorreta!</p>";
            echo "<a href='login.html'>Voltar para a página de login</a>";
        }
    }
    ?>

</body>
</html>