<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2> Resultados encontrados: </h2>

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

    $procura = "select * from tbl_users where username like '%$userlogin%'";
    $resultado = mysqli_query($liga, $procura);
    $nregistos = mysqli_num_rows($resultado);

    echo "Foram encontrados $nregistos registos.";
    ?>
    

    <?php
    for ($i = 0; $i < $nregistos; $i++) {
        $registo = mysqli_fetch_assoc($resultado);
        echo "<p>" . $registo['username'] . "</p>";
        echo "<p>" . $registo['password'] . "</p>";
        if($userpassword == $registo['password']){
            echo "<p>A password está correta!</p>";
        } else {
            echo "<p>Password incorreta!</p>";
        }
    }
    ?>

</body>
</html>