<?php
include_once 'config.php';
$user_logado = user_logged_in();
if($user_logado){
    $ligacao = liga();
    $update_user_offline = "update tbl_users set online = 0 where username = '" . get_username() . "'";
    mysqli_query($ligacao, $update_user_offline);
    session_unset();
    session_destroy();
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