<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$product = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    if($_FILES['image']['name'] != ""){

        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp, "images/".$image);

        mysqli_query($conn, "UPDATE products 
            SET name='$name', price='$price', category='$category', image='$image'
            WHERE id='$id'");
    }
    else{
        mysqli_query($conn, "UPDATE products 
            SET name='$name', price='$price', category='$category'
            WHERE id='$id'");
    }

    header("Location: manage_products.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
<link rel="stylesheet" href="edit_product.css">
</head>

<body>

<div class="container">

    <div class="card">

        <h2>✏️ Edit Product</h2>

        <form method="POST" enctype="multipart/form-data">

            <label>Product Name</label>
            <input type="text" name="name" value="<?php echo $product['name']; ?>" required>

            <label>Price (Rs.)</label>
            <input type="number" name="price" value="<?php echo $product['price']; ?>" required>

<!--category selection box-->
            <label>Category</label>
<select name="category" required>

    <option value="Laundry" 
        <?php if($product['category']=="Laundry") echo "selected"; ?>>
        Laundry
    </option>

    <option value="Bathroom"
        <?php if($product['category']=="Bathroom") echo "selected"; ?>>
        Bathroom
    </option>

    <option value="Disinfectant"
        <?php if($product['category']=="Disinfectant") echo "selected"; ?>>
        Disinfectant
    </option>

    <option value="Dishwash"
        <?php if($product['category']=="Dishwash") echo "selected"; ?>>
        Dishwash
    </option>

    <option value="Floor"
        <?php if($product['category']=="Floor") echo "selected"; ?>>
        Floor
    </option>

    <option value="Glass"
        <?php if($product['category']=="Glass") echo "selected"; ?>>
        Glass
    </option>

</select>

            <label>Current Image</label>
            <div class="img-box">
                <img src="images/<?php echo $product['image']; ?>">
            </div>

            <label>Change Image</label>
            <input type="file" name="image">

            <button type="submit" name="update">Update Product</button>

            <a href="manage_products.php" class="back">← Back</a>

        </form>

    </div>

</div>

</body>
</html>