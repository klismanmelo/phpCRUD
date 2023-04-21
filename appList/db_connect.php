<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "aplicativo";

    $connect = mysqli_connect($server, $username, $password, $dbname);

    if(!$connect){
        die(mysqli_connect_errno());
    }

    // echo 'Connect Sucesfuly';

?>