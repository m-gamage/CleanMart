

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="index.css?v=<?php echo filemtime('index.css'); ?>">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<!-- Navigation -->
<header class="navbar">

    <div class="logo">
        <img src="images/Logo.jpeg" alt="CleanMart Logo">

        <span class="brand">
            <span class="clean">Clean</span>
            <span class="mart">Mart</span>
        </span>
    </div>

    <nav id="navMenu">

        <a href="index.php">Home</a>
        <a href="product.php">Products</a>
        <a href="about.php">About</a>
        <a href="privacy.php">Privacy Policy</a>

        <?php if(isset($_SESSION['role'])){ ?>

            <?php if($_SESSION['role']=="admin"){ ?>

                <a href="admin_dashboard.php" class="btn-login">
                    Admin Dashboard
                </a>

            <?php } else { ?>

                <a href="dashboard.php" class="btn-login">
                    My Account
                </a>

            <?php } ?>

        <?php } else { ?>

            <a href="login.php" class="btn-login">
                Login
            </a>

        <?php } ?>

    </nav>

    <div class="nav-right">

        <div class="cart-icon">
            <a href="cart.php">
                🛒<span id="cart-count">0</span>
            </a>
        </div>

        <div class="Menu-icon" onclick="toggleMenu()">
            ☰
        </div>

    </div>

</header>