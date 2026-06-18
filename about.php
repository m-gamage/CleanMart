<?php
session_start();
include 'db.php';

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

$cartCount = count($_SESSION['cart']);

$messageStatus = "";

if(isset($_POST['send'])){

$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$sql="INSERT INTO contact_messages(name,email,message)
VALUES('$name','$email','$message')";

if($conn->query($sql)){
$messageStatus="Message sent successfully!";
}
else{
$messageStatus="Error sending message!";
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>About Us - CleanMart</title>

<link rel="stylesheet" href="aboutstyle.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

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

<a href="login.php" class="btn-login">

<?php

if(isset($_SESSION['user'])){

echo $_SESSION['user'];

}
else{

echo "Login";

}

?>

</a>

</nav>

<div class="nav-right">

<div class="cart-icon">

<a href="cart.php">

🛒<span id="cart-count"><?php echo $cartCount; ?></span>

</a>

</div>

<div class="Menu-icon" onclick="toggleMenu()">☰</div>

</div>

</header>

<section class="hero">

<div class="hero-content">

<h1>About Us</h1>

<p>

CleanMart is your trusted online store for high-quality cleaning products.

We provide a wide range of detergents, floor cleaners, and household essentials to make your life easier and cleaner.

Our mission is to deliver top-quality products with fast service and affordable prices.

We believe a clean home creates a happy life.

</p>

</div>

</section>

<section class="team">

<h2>Our Team</h2>

<div class="team-container">

<div class="member">
<img src="images/manager.webp">
<h4>Manager</h4>
<p>Leading CleanMart operations</p>
</div>

<div class="member">
<img src="images/support.jpg">
<h4>Support</h4>
<p>Helping customers 24/7</p>
</div>

<div class="member">
<img src="images/deliver boy.jpg">
<h4>Delivery</h4>
<p>Fast and reliable service</p>
</div>

</div>

</section>

<section class="contact-container">

<div class="contact-info">

<h2>Contact Info</h2>

<p>

<a href="tel:+94701231111">

<i class="fa fa-phone"></i>

+94 70 123 1111

</a>

</p>

<p>

<a href="mailto:cleanmart@gmail.com">

<i class="fa fa-envelope"></i>

cleanmart@gmail.com

</a>

</p>

<p>

<a href="#">

<i class="fa fa-map-marker-alt"></i>

Colombo, Sri Lanka

</a>

</p>

<div class="socials">

<a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>

<a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>

<a href="https://wa.me/94701231111"><i class="fab fa-whatsapp"></i></a>

</div>

</div>

<div class="contact-form">

<h2>Send Message</h2>

<?php

if($messageStatus!=""){

echo "<p style='color:green;'>$messageStatus</p>";

}

?>

<form method="POST">

<input
type="text"
name="name"
placeholder="Your Name"
required>

<input
type="email"
name="email"
placeholder="Your Email"
required>

<textarea
name="message"
placeholder="Your Message..."
required></textarea>

<button
type="submit"
name="send">

Send Message

</button>

</form>

</div>

</section>

<footer class="footer">

<div class="footer-container">

<div class="footer-logo">

<img src="images/Logo.jpeg">

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

<a href="https://wa.me/94701231111"><i class="fab fa-whatsapp"></i></a>

</div>

</div>

</div>

<p>© 2026 CleanMart | All Rights Reserved</p>

</footer>

<script src="aboutscript.js"></script>

</body>

</html>
