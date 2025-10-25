<?php
// add_product.php
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Product</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container">
<header>
<h1>Add Product</h1>
<nav>
<a class="btn" href="index.php">Back to Catalogue</a>
</nav>
</header>


<main>
<form action="save_product.php" method="post" class="form">
<label>Product name
<input type="text" name="name" required maxlength="255">
</label>


<label>Price (NGN)
<input type="number" name="price" step="0.01" min="0" required>
</label>


<label>Description
<textarea name="description" rows="6"></textarea>
</label>


<div class="form-actions">
<button type="submit">Save Product</button>
<a class="link" href="index.php">Cancel</a>
</div>
</form>
</main>


<footer>
<p>Product Catalogue</p>
</footer>
</div>
</body>
</html>