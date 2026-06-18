<?php
include "db.php";

$product_id = $_POST['product_id'];

// check if product already in cart
$check = $conn->query("SELECT * FROM cart WHERE product_id=$product_id");

if($check->num_rows > 0){
    $conn->query("UPDATE cart SET qty = qty + 1 WHERE product_id=$product_id");
} else {
    $conn->query("INSERT INTO cart (product_id, qty) VALUES ($product_id, 1)");
}

header("Location: product.php");
exit();
?>