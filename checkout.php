<?php
include "db.php";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $customer_name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // calculate total again
    $cart = $conn->query("
    SELECT cart.qty, products.price, cart.product_id
    FROM cart
    JOIN products ON cart.product_id = products.id
    ");

    $subtotal = 0;

    while($item = $cart->fetch_assoc()){
        $subtotal += $item['price'] * $item['qty'];
    }

    $delivery = 300;
    $total = $subtotal + $delivery;

    // insert order
    $conn->query("
        INSERT INTO orders (user_id, customer_name, phone, address, total, created_at, status)
        VALUES (1, '$customer_name', '$phone', '$address', $total, NOW(), 'Pending')
    ");

    $order_id = $conn->insert_id;

    // insert order items
    $cart = $conn->query("
    SELECT cart.qty, products.price, cart.product_id
    FROM cart
    JOIN products ON cart.product_id = products.id
    ");

    while($item = $cart->fetch_assoc()){

        $conn->query("
            INSERT INTO order_items (order_id, product_id, quantity, price)
            VALUES ($order_id, {$item['product_id']}, {$item['qty']}, {$item['price']})
        ");
    }

    // clear cart
    $conn->query("DELETE FROM cart");
     echo'
    <div style="
    max-width:500px;
    margin:80px auto;
    background:#fff;
    padding:40px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
    font-family:Poppins,sans-serif;
    ">
    <div style="font-size:70px;">✅</div>
    <h1 style="color:#00a651;margin-top:10px;">
    Order Placed Successfully!
    </h1>
    <p style="
    color:#666;
    font-size:16px;
    margin:15px 0 30px;
   line-height:1.6;
   ">
   Thank you for shopping with us.<br>
   Your order has been received and is being processed.
   </p>
   <a href="product.php" style="
   display:inline-block;
   padding:14px 30px;
   background:linear-gradient(135deg,#1e88e5,#00c853);
   color:white;
   text-decoration:none;
   border-radius:10px;
   font-weight:600;
   ">
   Continue Shopping
   </a>

   </div>
   ';
    exit();
}

// DISPLAY CHECKOUT PAGE

$cart = $conn->query("
SELECT cart.qty, products.price
FROM cart
JOIN products ON cart.product_id = products.id
");

$subtotal = 0;

while($item = $cart->fetch_assoc()){
    $subtotal += $item['price'] * $item['qty'];
}

$delivery = 300;
$total = $subtotal + $delivery;
?>
<!DOCTYPE html>
<html>
<head>
<title>Checkout</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#baeff4;
    min-height:100vh;
    padding:40px 20px;
}

.checkout-container{
    max-width:1000px;
    margin:auto;
    display:flex;
    gap:25px;
}

.summary-card,
.form-card{
    background:#fff;
    border-radius:16px;
    padding:25px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

.summary-card{
    flex:1;
    height:fit-content;
}

.form-card{
    flex:2;
}

.summary-card h2,
.form-card h2{
    margin-bottom:20px;
    color:#222;
}

.line{
    display:flex;
    justify-content:space-between;
    margin:15px 0;
    font-size:15px;
}

.total{
    font-size:20px;
    font-weight:600;
    color:#00a651;
}

hr{
    border:none;
    border-top:1px solid #eee;
    margin:15px 0;
}

form{
    display:flex;
    flex-direction:column;
    gap:15px;
}

input,
textarea{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:10px;
    font-size:15px;
    outline:none;
}

input:focus,
textarea:focus{
    border-color:#1e88e5;
}

textarea{
    resize:none;
    height:120px;
}

button{
    padding:14px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#1e88e5,#00c853);
    color:white;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
}

button:hover{
    opacity:0.9;
}

@media(max-width:768px){

    .checkout-container{
        flex-direction:column;
    }

}

</style>

</head>
<body>

<div class="checkout-container">

    <div class="summary-card">

        <h2>🧾 Order Summary</h2>

        <div class="line">
            <span>Subtotal</span>
            <span>Rs. <?php echo $subtotal; ?></span>
        </div>

        <div class="line">
            <span>Delivery Fee</span>
            <span>Rs. <?php echo $delivery; ?></span>
        </div>

        <hr>

        <div class="line total">
            <span>Total</span>
            <span>Rs. <?php echo $total; ?></span>
        </div>

    </div>

    <div class="form-card">

        <h2>📦 Delivery Details</h2>

        <form method="POST">

            <input
                type="text"
                name="customer_name"
                placeholder="Enter Full Name"
                required>

            <input
                type="text"
                name="phone"
                placeholder="Enter Phone Number"
                required>

            <textarea
                name="address"
                placeholder="Enter Delivery Address"
                required></textarea>

            <button type="submit">
                Place Order
            </button>

        </form>

    </div>

</div>

</body>
</html>