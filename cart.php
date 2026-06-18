<?php
include "db.php";

$result = $conn->query("
SELECT cart.id, cart.qty, products.name, products.price, products.image
FROM cart
JOIN products ON cart.product_id = products.id
");

$subtotal = 0;
?>

<!DOCTYPE html>
<html>
<head>
<title>My Cart</title>
<link rel="stylesheet" href="cartstyle.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>

<body>

<header>
    <h1><span class="clean">Clean</span><span class="mart">Mart</span> Cart 🛒</h1>
</header>

<div class="cart-wrapper">

    <div class="cart-left">

        <?php if ($result->num_rows == 0) { ?>
            <p id="empty-msg">Your cart is empty 🛒</p>
        <?php } ?>

        <?php while($row = $result->fetch_assoc()) {

        $total = $row['price'] * $row['qty'];
        $subtotal += $total;
        ?>

        <div class="cart-card">

            <div class="img-box">
                <img src="images/<?php echo $row['image']; ?>" alt="">
            </div>

            <div class="details">
                <h3><?php echo $row['name']; ?></h3>

                <p class="price">Rs. <?php echo $row['price']; ?> × <?php echo $row['qty']; ?></p>

                <p class="total">Total: <b>Rs. <?php echo $total; ?></b></p>
            </div>

            <div class="actions">
                <a href="cart_remove.php?id=<?php echo $row['id']; ?>">
                    <button class="remove-btn">Remove</button>
                </a>
            </div>

        </div>

        <?php } ?>

    </div>

    <div class="cart-right">

        <div class="summary-card">
            <h2>Order Summary</h2>

            <div class="line">
                <span>Subtotal</span>
                <span>Rs. <?php echo $subtotal; ?></span>
            </div>

            <div class="line">
                <span>Delivery</span>
                <span>Rs. 300</span>
            </div>

            <hr>

            <div class="line total-line">
                <span>Total</span>
                <span>Rs. <?php echo $subtotal + 300; ?></span>
            </div>

            <a href="checkout.php">
                <button class="checkout-btn">Proceed to Checkout</button>
            </a>
        </div>

    </div>

</div>
</body>
</html>