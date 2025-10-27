<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "users";
    $port = "3306";

    try {
        $conn = new mysqli($host, $user, $password, $database, $port);
    } catch (Exception $e) {
        echo "Connection failed!";
    }
?>