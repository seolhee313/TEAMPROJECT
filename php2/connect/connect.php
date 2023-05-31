<?php
    //phpinfo();
    $host = "localhost";
    $user = "gp2617";
    $pw = "tjfmgl9513!";
    $db = "gp2617";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");

    if(mysqli_connect_errno()){
        echo "Database Connect False";
    } else {
        // echo "Database Connect True";
    }
?>

