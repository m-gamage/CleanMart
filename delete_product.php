<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$id = $_GET['id'];

// delete image file too
$get = mysqli_query($conn, "SELECT image FROM products WHERE id='$id'");
$row = mysqli_fetch_assoc($get);

if($row){
    $imagePath = "images/" . $row['image'];
    if(file_exists($imagePath)){
        unlink($imagePath);
    }
}

mysqli_query($conn, "DELETE FROM products WHERE id='$id'");

header("Location: manage_products.php");
exit();
?>