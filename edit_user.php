<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$user = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn,
        "UPDATE users 
         SET name='$name', email='$email'
         WHERE id='$id'");

    header("Location:manage_users.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="edit_user.css">
</head>
<body>

<div class="container">

    <div class="card">

        <h2>✏️ Edit User</h2>

        <form method="POST">

            <label>Full Name</label>
            <input type="text" name="name"
                   value="<?php echo $user['name']; ?>"
                   required>

            <label>Email Address</label>
            <input type="email" name="email"
                   value="<?php echo $user['email']; ?>"
                   required>

            <button type="submit" name="update">
                Update User
            </button>

            <a href="manage_users.php" class="back">
                Back
            </a>

        </form>

    </div>

</div>

</body>
</html>