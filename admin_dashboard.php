<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$totalUsers = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
$totalProducts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
$totalOrders = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
$totalMessages = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM contact_messages"));
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">

<!-- header link -->
<?php include 'header.php'; ?>

<title>Admin Dashboard</title>

<link rel="stylesheet" type="text/css" href="admin_dashboard.css?v=<?php echo filemtime('admin_dashboard.css'); ?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


</head>
<body>

<br>
<div class="admin-container">

    <h1>🛠 Admin Dashboard</h1>

    <div class="stats">

        <div class="card">
    <i class="fas fa-users"></i>
    <h2><?php echo $totalUsers; ?></h2>
    <p>Total Users</p>
</div>

<div class="card">
    <i class="fas fa-box"></i>
    <h2><?php echo $totalProducts; ?></h2>
    <p>Total Products</p>
</div>

<div class="card">
    <i class="fas fa-shopping-cart"></i>
    <h2><?php echo $totalOrders; ?></h2>
    <p>Total Orders</p>
</div>

<div class="card">
    <i class="fas fa-envelope"></i>
    <h2><?php echo $totalMessages; ?></h2>
    <p>Total Messages</p>
</div>

    </div>

    <div class="admin-links">
    <a href="manage_users.php">Manage Users</a>
    <a href="manage_products.php">Manage Products</a>
    <a href="manage_orders.php">Manage Orders</a>
    <a href="manage_messages.php">Manage Messages</a>
</div>

<!-- Logout separated -->
 <br><br><br>
<div class="logout-container">
    <a href="logout.php" class="logout-btn">Logout</a>
</div>

</div>

<br>
<!-- footer link -->
<?php include 'footer.php'; ?>


</body>
</html>