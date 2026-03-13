<?php
include 'config.php';
$user_logado = user_logged_in();
if($user_logado){
    $_SESSION["user_logged_in"] = "false";
        echo '<html>
        <head>
        <meta http-equiv="refresh" content="0;url=index.php"/>
        </head>
        <body>
        redirecting...
        </body>
        </html>';
                           
} else {
    echo "No user is currently logged in.";
    echo "<a href='index.php'>Voltar para a página inicial</a>";
} 
?>