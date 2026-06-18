<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>User Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="dashboardstyle.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
<?php if(isset($_SESSION['role']) && $_SESSION['role'] == "admin"){ ?>

<h1>CleanMart Admin Panel</h1>

<?php
$totalUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));
$totalProducts = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM products"));
$totalOrders = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM orders"));
$totalMessages = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM contact_messages"));
?>

<h3>Total Users: <?php echo $totalUsers; ?></h3>

<h3>Total Products: <?php echo $totalProducts; ?></h3>

<h3>Total Orders: <?php echo $totalOrders; ?></h3>

<h3>Total Messages: <?php echo $totalMessages; ?></h3>

<ul>

<li><a href="manage_users.php">Manage Users</a></li>

<li><a href="manage_products.php">Manage Products</a></li>

<li><a href="manage_orders.php">Manage Orders</a></li>

<li><a href="manage_messages.php">Manage Messages</a></li>

<li><a href="logout.php">Logout</a></li>

</ul>

<?php } else { ?>
<div class="container">

<div class="sidebar">
<h2>👤 My Account</h2>

<ul class="menu">
<li onclick="showSection('profile',this)">
<i class="fa fa-user"></i> Profile
</li>

<li onclick="logout()">
<i class="fa fa-sign-out-alt"></i> Sign Out
</li>
</ul>
</div>

<div class="main">

<div id="profile" class="card profile-card">
<h1>Profile</h1>

<p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
<p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>

</div>

</div>
</div>
<?php } ?>
<script>
function logout(){
    window.location="logout.php";
}
</script>

</body>
</html>