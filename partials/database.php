<?php
include_once __DIR__ . '/../env.php';

// Connection
$conn = new mysqli($server_name, $username, $password, $db_name);

// Check connection
if ($conn && $conn->connect_error) {
    die("Connection error");
}