<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM contact_messages ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Messages</title>

<!-- header link -->
<?php include 'header.php'; ?>


<!--css link-->
<link rel="stylesheet" type="text/css" href="manage_messages.css?v=<?php echo filemtime('manage_messages.css'); ?>">

</head>
<body>

<br>
<div class="container">

    <h2>📩 Contact Messages</h2>

    <div class="table-wrapper">

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <td><?php echo $row['id']; ?></td>

                <td><?php echo htmlspecialchars($row['name']); ?></td>

                <td><?php echo htmlspecialchars($row['email']); ?></td>

                <td class="message">
                    <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                </td>

                <td><?php echo $row['created_at']; ?></td>

                <td>
                    <a class="delete-btn"
                       href="delete_message.php?id=<?php echo $row['id']; ?>"
                       onclick="return confirm('Delete this message?')">
                       Delete
                    </a>
                </td>
            </tr>

            <?php } ?>

        </table>

    </div>


</div>
<br>

<!--footer link-->
<?php include 'footer.php'; ?>

</body>
</html>