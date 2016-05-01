<?php

function DBConnect()
{
    require "configuration.php";

// Create connection
    $conn = new mysqli($serverName, $userName, $password, $DBName);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    return $conn;
}