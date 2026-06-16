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
    if(is_admin()){
        echo '<a href="admin_page.php">Admin Page</a>';
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

function get_user_by_id($id){
    $ligacao = liga();
    $query = "SELECT * FROM tbl_users WHERE id_user = $id";
    $result = mysqli_query($ligacao, $query);
    return mysqli_fetch_assoc($result);
}
function get_username(){
    if(user_logged_in()){

       return $_SESSION["user_login"];
    } else {
        return "Guest";

    }
}

define("PASTA_IMGS", "imagens/jogos");
   

function get_jogos(){
    $ligacao = liga();
    $query = "SELECT * FROM tbl_jogos";
    $result = mysqli_query($ligacao, $query);
    $jogos = [];
    while($row = mysqli_fetch_assoc($result)){
        $jogos[] = $row;
    }
    return $jogos;
}

function get_jogo_by_id($id){
    $ligacao = liga();
    $query = "SELECT * FROM tbl_jogos WHERE id_jogo = $id";
    $result = mysqli_query($ligacao, $query);
    return mysqli_fetch_assoc($result);
}

function add_jogo($nome_jogo, $link_site_jogo, $imagem_jogo, $data_lancamento, $rating){
    $ligacao = liga();
    $query = "INSERT INTO tbl_jogos (nome_jogo, link_site_jogo, imagem_jogo, data_lancamento, rating) VALUES ('$nome_jogo', '$link_site_jogo', '$imagem_jogo', '$data_lancamento', '$rating')";
    mysqli_query($ligacao, $query);
}

function update_jogo($id_jogo, $nome_jogo, $link_site_jogo, $imagem_jogo, $data_lancamento, $rating){
    $ligacao = liga();
    $query = "UPDATE tbl_jogos SET nome_jogo='$nome_jogo', link_site_jogo='$link_site_jogo', imagem_jogo='$imagem_jogo', data_lancamento='$data_lancamento', rating='$rating' WHERE id_jogo=$id_jogo";
    mysqli_query($ligacao, $query);
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

function delete_jogo($id_jogo){
    $ligacao = liga();
    $query = "DELETE FROM tbl_jogos WHERE id_jogo=$id_jogo";
    mysqli_query($ligacao, $query);
}
function get_admins(){
    $ligacao = liga();
    $query = "SELECT * FROM tbl_users WHERE cargo = '9'";
    $result = mysqli_query($ligacao, $query);
    $admins = [];
    while($row = mysqli_fetch_assoc($result)){
        $admins[] = $row;
    }
    return $admins;
}

function is_admin(){
    if(user_logged_in()){
        $username = get_username();
        $admins = get_admins();
        foreach($admins as $admin){
            if($admin['username'] == $username){
                return true;
            }
        }
    }
    return false;
}

function get_users_online(){
    $ligacao = liga();
    $query = "SELECT username FROM tbl_users WHERE online = 1";
    $result = mysqli_query($ligacao, $query);
    $users_online = [];
    while($row = mysqli_fetch_assoc($result)){
        $users_online[] = $row['username'];
    }
    return $users_online;
}
function is_online(){
    if(user_logged_in()){
        $username = get_username();
        $users_online = get_users_online();
        foreach($users_online as $user){
            if($user == $username){
                return true;
            }
        }
    }
    return false;
}  

function get_users_info(){
    $ligacao = liga();
    $query = "SELECT * FROM tbl_users";
    $result = mysqli_query($ligacao, $query);
    $users_info = [];
    while($row = mysqli_fetch_assoc($result)){
        $users_info[] = $row;
    }
    return $users_info;
}

function update_user($id, $cargo){
    $ligacao = liga();
    $query = "UPDATE tbl_users SET cargo='$cargo' WHERE id_user=$id";
    mysqli_query($ligacao, $query);
}
?>

