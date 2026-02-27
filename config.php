<?php 
session_start();
function nav_bar(){
    echo '<a href="index.php">Home</a>';
     if(isset($_SESSION["user_logged_in"])){
         if($_SESSION["user_logged_in"] == "true"){
                        echo '<a href="chat.php">Chat</a>';
                    } 
                }
                echo '<a href="about.php">About</a>'; 
                if(isset($_SESSION["user_logged_in"])){
                    if($_SESSION["user_logged_in"] == "false"){
                        echo '<a href="login.php">Login</a>';
                    } 
                } 
                if(isset($_SESSION["user_logged_in"])){
                    if($_SESSION["user_logged_in"] == "true"){
                        echo '<a href="logout.php">Logout</a>';
                        
                    } 
                } 
}

function liga(){
    // Configuração da ligação ao servidor
    $liga = mysqli_connect('localhost', 'root');

    // Verificação da ligação
    if (!$liga) {
        echo "<h2> ERRO!!! Falha na ligação ao Servidor! </h2>";
        exit;
    }

    // Ligação à base de dados
    mysqli_select_db($liga, 'bd_gamersway');
    return $liga;
}
?>