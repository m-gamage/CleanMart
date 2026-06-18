<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM orders");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Orders</title>

<!-- header link -->
<?php include 'header.php'; ?>


<!--css link-->
<link rel="stylesheet" type="text/css" href="manage_orders.css?v=<?php echo filemtime('manage_orders.css'); ?>">

</head>
<body>

<br>
<div class="container">

    <h2>📦 Manage Orders</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Total</th>
            <th>Created At</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td>Rs. <?php echo $row['total']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td><?php echo $row['status']; ?></td>

            <td>
                <!--get method-->
                <a class="edit-btn" href="edit_order.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="delete-btn" href="delete_order.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Delete this order?')">Delete</a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>
<br>

<!--footer link-->
<?php include 'footer.php'; ?>

</body>
</html>