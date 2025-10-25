<?php
// Database configuration (update with your MySQL details)
$host = 'localhost'; // Replace with your MySQL host
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password
$database = 'product_catalog'; // Database name (created by setup.php)

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>