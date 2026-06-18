<?php
session_start();
include 'db.php';

//adding new product
if(isset($_POST['add'])){

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];

    move_uploaded_file($temp, "images/".$image);

    $sql = "INSERT INTO products(name, price, image, category)
            VALUES('$name','$price','$image','$category')";

    mysqli_query($conn, $sql);

    echo "<script>alert('Product Added Successfully');</script>";
}


if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location:index.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<!--header link-->
<?php include 'header.php'; ?>

<title>Manage Products</title>

<!--css link-->
<link rel="stylesheet" type="text/css" href="manage_products.css?v=<?php echo filemtime('manage_products.css'); ?>">

</head>
<body>

<br>
<div class="container">

    <h1>📦 Manage Products</h1>

    <!-- Buttons -->
    <div class="tabs">
        <button onclick="showTab('add')">➕ Add New Product</button>
        <button onclick="showTab('view')">📋 Product Details</button>
    </div>

    <!--Add product -->
    <div id="add" class="tab-content">

        <form method="POST" enctype="multipart/form-data">

            <h2>Add Product</h2>

            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>

            <label>Category</label>
<select name="category" required>

    <option value="">-- Select Category --</option>

    <option value="Laundry">Laundry</option>
    <option value="Bathroom">Bathroom</option>
    <option value="Disinfectant">Disinfectant</option>
    <option value="Dishwash">Dishwash</option>
    <option value="Floor">Floor</option>
    <option value="Glass">Glass</option>

</select>
            
            <input type="file" name="image" required>

            <button type="submit" name="add">Add Product</button>
            <a href="admin_dashboard.php" class="back">← Back</a>

        </form>

    </div>

    <!-- product table -->
    <div id="view" class="tab-content">

        <h2>Product Details</h2>

        <table>

            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>

            <?php while($row = mysqli_fetch_assoc($result)){ ?>

            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>Rs. <?php echo $row['price']; ?></td>
                <td>
                    <img src="images/<?php echo $row['image']; ?>">
                </td>
                <td><?php echo $row['category']; ?></td>

                <td>
                    <a class="edit" href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a class="delete" href="delete_product.php?id=<?php echo $row['id']; ?>"
                       onclick="return confirm('Delete this product?')">Delete</a>
                </td>
            </tr>

            <?php } ?>

        </table>
        <a href="admin_dashboard.php" class="back">← Back</a>

    </div>

</div>

<script>
function showTab(tab){

    document.querySelectorAll(".tab-content").forEach(div=>{
        div.style.display = "none";
    });

    document.getElementById(tab).style.display = "block";
}

// default view
showTab('add');
</script>

<br>

<!--footer link-->
<?php include 'footer.php'; ?>

</body>
</html>