<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'product_catalog'; 

$conn = new mysqli($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_create_db = "CREATE DATABASE IF NOT EXISTS `$database`";

if ($conn->query($sql_create_db) === TRUE) {
    echo "<div style='color: green;'>Database '$database' created successfully or already exists.</div><br>";
} else {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($database);

$sql_create_table = "
    CREATE TABLE IF NOT EXISTS `products` (
      `id` INT(11) NOT NULL AUTO_INCREMENT,
      `name` VARCHAR(255) NOT NULL,
      `price` DECIMAL(10,2) NOT NULL,
      `description` TEXT NOT NULL,
      `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

if ($conn->query($sql_create_table) === TRUE) {
    echo "<div style='color: green;'>Table 'products' created successfully or already exists.</div><br>";
} else {
    die("Error creating table: " . $conn->error);
}

$sql_insert_samples = "
    INSERT INTO `products` (`name`, `price`, `description`) VALUES
    ('Laptop', 999.99, 'A high-performance laptop for work and gaming.'),
    ('Mouse', 25.50, 'Wireless ergonomic mouse.'),
    ('Keyboard', 75.00, 'Mechanical keyboard with RGB lighting.')
    ON DUPLICATE KEY UPDATE name=name;  -- Avoid duplicates if re-run
";

if ($conn->query($sql_insert_samples) === TRUE) {
    echo "<div style='color: green;'>Sample products inserted successfully.</div><br>";
} else {
    echo "<div style='color: orange;'>Warning: Could not insert samples (might already exist): " . $conn->error . "</div><br>";
}

echo "<div style='color: blue;'>Setup complete! You can now use the other PHP files. Visit <a href='index.php'>index.php</a> to start.</div>";

$conn->close();
?>