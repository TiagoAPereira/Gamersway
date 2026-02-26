<?php
session_start() ;
if(isset($_SESSION["user_logged_in"])){
                    if($_SESSION["user_logged_in"] == "true"){
                        $_SESSION["user_logged_in"] = "false";
                        echo '<html>
                        <head>
                        <meta http-equiv="refresh" content="0;url=index.php"/>
                        </head>
                        <body>
                        redirecting...
                        </body>
                        </html>';
                           
                    } 
                } 
?>