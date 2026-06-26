<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pi353socialdigital";

    $conn = new mysqli($servername, $username, $password, $database);
    return $conn;

    if (!$conn) {
        die('Not connected: ' . mysqli_connect_error());
    }
?>