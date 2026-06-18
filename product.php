<?php
include "db.php";
$cart_result = $conn->query("SELECT SUM(qty) AS total FROM cart");
$data = $cart_result->fetch_assoc();
$cart_count = $data['total'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CleanMart Products</title>

<link rel="stylesheet" href="productstyle.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>

<body>

<header style="position:relative;">
<h1>
<span class="clean">Clean</span><span class="mart">Mart</span> Products
</h1>

<a href="cart.php" style="position:absolute; right:20px; top:20px; font-size:22px; text-decoration:none;">
🛒 <span id="cart-count"><?php echo $cart_count; ?></span>
</a>
</header>

<!-- Search -->
<div class="search-box">
<input type="text" id="search" placeholder="Search cleaning products...">
</div>

<!-- Filters -->
<div class="filters">
<button onclick="filterProducts('all')">All</button>
<button onclick="filterProducts('Laundry')">Laundry</button>
<button onclick="filterProducts('Bathroom')">Bathroom</button>
<button onclick="filterProducts('Disinfectant')">Disinfectant</button>
<button onclick="filterProducts('Dishwash')">Dishwash</button>
<button onclick="filterProducts('Floor')">Floor</button>
<button onclick="filterProducts('Glass')">Glass</button>
</div>

<!--products-->
<?php
include "db.php";

$result = $conn->query("SELECT * FROM products");
?>

<section class="product-grid">

<?php while($row = $result->fetch_assoc()) { ?>

<div class="product-card <?php echo $row['category']; ?>">

    <img src="images/<?php echo $row['image']; ?>">

    <h3><?php echo $row['name']; ?></h3>

    <p>Rs.<?php echo $row['price']; ?></p>

    <form method="POST" action="addto_cart.php">
        <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
        <button type="submit">Add to Cart</button>
    </form>

</div>

<?php } ?>

</section>

<!-- FOOTER -->
<footer class="footer">
<div class="footer-container">

<div class="footer-logo">
<img src="images/Logo.jpeg" alt="CleanMart Logo">
</div>

<div class="footer-col">
<h4>Quick Links</h4>
<a href="index.php">Home</a>
<a href="product.php">Products</a>
<a href="about.php">About</a>
<a href="privacy.php">Privacy</a>
</div>

<div class="footer-col">
<h4>Contact</h4>
<p>📞 +94 70 123 1111</p>
<p>📧 cleanmart@gmail.com</p>
</div>

<div class="footer-col">
<h4>Follow Us</h4>
<div class="socials">
 <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
 <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
<a href="https://wa.me/9470 123 1111"><i class="fab fa-whatsapp"></i></a>
</div>

</div>

<p>© 2026 CleanMart | All Rights Reserved</p>
</footer>
<script src="productscript.js"></script>
</body>
</html>