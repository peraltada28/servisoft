<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="db_servisoft_2023";

    $mysqli = new mysqli($server, $username, $password, $database);
    if($mysqli->connect_error){
        die('error'.$mysqli->connection_error);
    }
?>