<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn,
    "SELECT * FROM orders WHERE id='$id'");

$order = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $status = $_POST['status'];

    mysqli_query($conn,
        "UPDATE orders
         SET status='$status'
         WHERE id='$id'");

    header("Location:manage_orders.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Order</title>

<link rel="stylesheet" href="edit_order.css">

</head>
<body>

<div class="container">

    <div class="card">

        <h2>📦 Edit Order Status</h2>

        <div class="order-info">

            <div class="info-box">
                <span>Order ID</span>
                <strong><?php echo $order['id']; ?></strong>
            </div>

            <div class="info-box">
                <span>User ID</span>
                <strong><?php echo $order['user_id']; ?></strong>
            </div>

            <div class="info-box">
                <span>Total Amount</span>
                <strong>Rs. <?php echo $order['total']; ?></strong>
            </div>

        </div>

        <form method="POST">

            <label>Order Status</label>

            <select name="status" required>

                <option value="Order Placed"
                    <?php if($order['status']=="Order Placed") echo "selected"; ?>>
                    Order Placed
                </option>

                <option value="Packed"
                    <?php if($order['status']=="Packed") echo "selected"; ?>>
                    Packed
                </option>

                <option value="Shipped"
                    <?php if($order['status']=="Shipped") echo "selected"; ?>>
                    Shipped
                </option>

                <option value="Delivered"
                    <?php if($order['status']=="Delivered") echo "selected"; ?>>
                    Delivered
                </option>

            </select>

            <button type="submit" name="update">
                Update Order
            </button>

            <a href="manage_orders.php" class="back-btn">
                ← Back to Orders
            </a>

        </form>

    </div>

</div>

</body>
</html>