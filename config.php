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
?>