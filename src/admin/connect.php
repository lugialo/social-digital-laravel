<?php
    $servername = "www.cedup.net.br:33061/";
    $username = "pi353socialdigital";
    $password = "@45094009/key";
    $database = "pi353socialdigital";

    $conn = new mysqli($servername, $username, $password, $database);
    return $conn;

    if (!$conn) {
        die('Not connected: ' . mysqli_connect_error());
    }
?>