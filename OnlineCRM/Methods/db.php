<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "crm02";

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name); 

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 