<?php
require 'db.php';


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: index.php');
exit;
}


$name = trim($_POST['name'] ?? '');
$price = isset($_POST['price']) ? (float)$_POST['price'] : 0.00;
$description = trim($_POST['description'] ?? '');


$errors = [];
if ($name === '') $errors[] = 'Name is required.';
if ($price < 0) $errors[] = 'Price must be 0 or greater.';


if ($errors) {
// For simplicity, show first error and a back link
echo '<p>' . htmlspecialchars($errors[0]) . '</p>';
echo '<p><a href="javascript:history.back()">Go back</a></p>';
exit;
}


$sql = 'INSERT INTO products (name, price, description) VALUES (:name, :price, :description)';
$stmt = $pdo->prepare($sql);
$stmt->execute([
':name' => $name,
':price' => $price,
':description' => $description,
]);


// Redirect to product view
$id = $pdo->lastInsertId();
header('Location: view_product.php?id=' . $id);
exit;