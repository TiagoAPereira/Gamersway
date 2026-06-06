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
                if(isset($_SESSION["user_logged_in"])){
                    if($_SESSION["user_logged_in"] == "false"){
                        echo '<a href="signin.php">Sign in</a>';
                    } 
                }
}

function liga(){
    // Configuração da ligação ao servidor
    $ligacao = mysqli_connect('localhost', 'root');

    // Verificação da ligação
    if (!$ligacao) {
        echo "<h2> ERRO!!! Falha na ligação ao Servidor! </h2>";
        exit;
    }

    // Ligação à base de dados
    mysqli_select_db($ligacao, 'bd_gamersway');
    return $ligacao;
}

function user_logged_in(){
    if(isset($_SESSION["user_logged_in"])){
        if($_SESSION["user_logged_in"] == "true"){
            return true;
        } 
     else {
        return false;
    }
    }
     else {
        return false;
    }
}
function get_username(){
    if(user_logged_in()){

       return $_SESSION["user_login"];
    } else {
        return "Guest";

    }
}

define("PASTA_IMGS", "imagens/jogos");
   

function get_jogo($id){
    $ligacao = liga();
    $query = "SELECT * FROM tbl_jogos WHERE id_jogo = $id";
    $result = mysqli_query($ligacao, $query);
    return mysqli_fetch_assoc($result);
}

function get_top_jogos($num){
    $ligacao = liga();
    $query = "SELECT * FROM tbl_jogos ORDER BY rating DESC LIMIT $num";
    $result = mysqli_query($ligacao, $query);
    $jogos = [];
    while($row = mysqli_fetch_assoc($result)){
        $jogos[] = $row;
    }
    return $jogos;
}

?>

