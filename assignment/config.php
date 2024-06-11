<?php
    // config.php

    // Database connection parameters
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "mydb";

    // Create connection
    $conn = new mysqli($hostname, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
