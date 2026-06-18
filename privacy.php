<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Privacy Policy - CleanMart</title>

<link rel="stylesheet" href="privacystyle.css">

<!--font-->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<!--icon-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
<!-- Navbar -->
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
    <a href="login.php" class="btn-login">Login</a>
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

<!--hero -->
<section class="hero">
<h1 class="title">Privacy Policy</h1>
<p class="subtitle">Your trust matters to us..</p>
<div class="cards">
<div class="card">
<i class="fas fa-thumbtack"></i>
<h3>Information We Collect</h3>
<p>We collect personal details like your name, email, phone number, and address when you register or order.</p>
</div>
<div class="card">
<i class="fas fa-lock"></i>
<h3>How We Use Your Info</h3>
<p>Your data helps us process orders, improve services, and give you a better shopping experience.</p>
</div>

<div class="card">
<i class="fas fa-shield-alt"></i>
<h3>Data Protection</h3>
<p>We use modern security technologies to protect your information from unauthorized access.</p>
</div>
<div class="card">
<i class="fas fa-cookie-bite"></i>
<h3>Cookies</h3>
<p>We use cookies to improve your browsing experience and analyze traffic.</p>
</div>
<div class="card">
<i class="fas fa-share-alt"></i>
<h3>Sharing Info</h3>
<p>We do not sell your data. We only share it for delivery purposes.</p>
</div>
<div class="card contact">
<i class="fas fa-phone"></i>
<h3>Contact Us</h3>
<p>Have questions? Reach out anytime via email or phone.</p>
</div>
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

<script  src="privacyscript.js"></script>
</body>
</html>