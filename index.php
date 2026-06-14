<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CleanMart | Quality Cleaning Starts Here</title>
<link rel="icon" href="fav-icon.jpeg" type="image/png">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="productstyle.css">

<!--Font-->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<!--icon link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>

<!-- Nav bar -->
<header class="navbar">
  <div class="logo">
    
    <img src="images/Logo.jpeg" alt="CleanMart Logo">
    <span class="brand">
        <span class="clean">Clean</span>
        <span class="mart">Mart</span>
    </span>
</div>
  <nav id="navMenu">
    <a href="index.php">Home</a>
    <a href="product.php">Products</a>
    <a href="about.php">About</a>
    <a href="privacy.php">Privacy Policy</a>

<?php if(isset($_SESSION['user'])){ ?>
    <a href="dashboard.php" class="btn-login">My Account</a>
<?php } else { ?>
    <a href="login.php" class="btn-login">Login</a>
<?php } ?>

  </nav>

  <div class="nav-right">
  <!-- Cart icon -->
  <div class="cart-icon">
  <a href="cart.php">
    🛒<span id="cart-count">0</span>
  </a>
  </div>
  <!--Menu icon-->
  <div class="Menu-icon"onclick="toggleMenu()">☰</div>
  </div>
</header>

<!--Hero-->
<section class="hero">
  <div class="hero-content">
    <h1>Quality Cleaning Starts Here</h1>
    <p>Premium cleaning products for a healthier and happier home.</p>
    <div class="hero-buttons">
      <button class="primary-btn">Shop Now</button>
      <button class="secondary-btn">Learn More</button>
  
    </div>
  </div>
  <div class="hero-img">
    <img src="images/hero image.png" alt="Cleaning">
  </div>
  <div class="hero-shape"></div>
</section>

<!--Features -->
<section class="features">

  <div class="feature-card">
    <div class="feature-icon">
      <img src="images/quality grade.jpg" alt="High Quality">
    </div>
    <h3>High Quality</h3>
    <p>Top-grade cleaning solutions</p>
  </div>

  <div class="feature-card">
    <div class="feature-icon">
      <img src="images/delivery truck.jpg" alt="Fast Delivery">
    </div>
    <h3>Fast Delivery</h3>
    <p>Island-wide delivery service</p>
  </div>

  <div class="feature-card">
    <div class="feature-icon">
      <img src="images/security.jpg" alt="Secure Payment">
    </div>
    <h3>Secure Payment</h3>
    <p>Safe & trusted checkout</p>
  </div>

</section>


<!-- Products -->
<section class="products">
<h2>Best Sellers</h2>

<div class="product-grid">

<div class="product-card">
<img src="images/Surfexecl liquid.jpeg" alt="Lanudary Detergent">
<h3>Laundry Detergent Liquid</h3>
<p>Rs.1200.00</p>
<button onclick="addToCart()">Add to Cart</button>
</div>

<div class="product-card">
<img src="images/dw liquid.jpeg" alt="Dish Wash">
<h3>Dish Wash Liquid</h3>
<p>Rs.890.00</p>
<button onclick="addToCart()">Add to Cart</button>
</div>

<div class="product-card">
<img src="images/f cleanners.jpeg" alt="Floor Cleaner">
<h3>Floor Cleaner</h3>
<p>Rs.1100.00</p>
<button onclick="addToCart()">Add to Cart</button>
</div>

<div class="product-card">
<img src="images/spray.jpeg" alt="Glass Cleaner">
<h3>Glass Cleaner</h3>
<p>Rs.450.00</p>
<button onclick="addToCart()">Add to Cart</button>
</div>
</section>
<!--Footer-->
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
        <div class="socials">
        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
        <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/9470 123 1111"><i class="fab fa-whatsapp"></i></a>
</div>
    </div>
  </div>
  <p>© 2026 CleanMart | All Rights Reserved</p>
</footer>

<script  src="script.js"></script>
</body>
</html>
