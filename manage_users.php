<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>

<!--header link-->
<?php include 'header.php'; ?>

    <title>Manage Users</title>
    <link rel="stylesheet" type="text/css" href="manage_users.css?v=<?php echo filemtime('manage_users.css'); ?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<br>
<div class="container">

    <h2>👥 Manage Users</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>

            <td>
                <a class="edit" href="edit_user.php?id=<?php echo $row['id']; ?>">
                    <i class="fa fa-edit"></i> Edit
                </a>

                <a class="delete"
                   href="delete_user.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Delete this user?')">
                    <i class="fa fa-trash"></i> Delete
                </a>
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