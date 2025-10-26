<?php
require 'db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
header('Location: index.php');
exit;
}
$stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$stmt->execute([':id' => $id]);
$product = $stmt->fetch();
if (!$product) {
http_response_code(404);
echo '<p>Product not found.</p><p><a href="index.php">Back</a></p>';
exit;
}
?>


<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($product['name']) ?></title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
<header>
<h1><?= htmlspecialchars($product['name']) ?></h1>
<nav>
<a class="btn" href="index.php">Back to Catalogue</a>
<a class="btn" href="add_product.php">Add Product</a>
</nav>
</header>


<main class="product-detail">
<p class="price">₦<?= number_format($product['price'], 2) ?></p>
<div class="description">
<?= nl2br(htmlspecialchars($product['description'])) ?>
</div>
</main>


<footer>
<p>Product Catalogue</p>
</footer>
</div>
</body>
</html>