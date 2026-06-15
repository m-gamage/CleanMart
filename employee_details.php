<?php 
include 'db.php';

/* ===== SEARCH FUNCTION HERE ===== */
if(isset($_GET['search']) && $_GET['search'] != ""){
    
    $search = $_GET['search'];

    $sql = "SELECT * FROM employees 
            WHERE name LIKE '%$search%' 
            OR email LIKE '%$search%' 
            OR role LIKE '%$search%'";
} 
else {
    $sql = "SELECT * FROM employees";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>

    <!-- SAME CSS + LIBRARIES AS MAIN PAGE -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="employee.css?v=<?php echo filemtime('employee.css'); ?>">
    <link rel="stylesheet" type="text/css" href="details.css?v=<?php echo filemtime('details.css'); ?>">
</head>

<body>

<?php include 'header.php'; ?>

<br>
<h2 class="page-title">Employee details</h2>

<!-- SHOW SEARCH TEXT -->
<?php if(isset($_GET['search'])): ?>
    <p style="text-align:center;">
        Results for: <b><?= $_GET['search']; ?></b>
    </p>
<?php endif; ?>

<!-- Success Message -->
<?php if(isset($_GET['updated'])): ?>
<center><div class="toast-success" id="toast">
    ✅ Employee Updated!
</div></center>
<?php endif; ?>

<!-- Delete Success Message -->
<?php if(isset($_GET['deleted']) && $_GET['deleted']==1): ?>
<center>
<div class="toast-success" id="deleteToast">
    🗑️ Employee Deleted!
</div>
</center>
<?php endif; ?>

<script>
setTimeout(() => {

    const toast = document.getElementById("toast");
    if(toast){
        toast.classList.add("toast-hide");

        setTimeout(() => {
            toast.remove();
        }, 1000);
    }

    const deleteToast = document.getElementById("deleteToast");
    if(deleteToast){
        deleteToast.classList.add("toast-hide");

        setTimeout(() => {
            deleteToast.remove();
        }, 1000);
    }

}, 2500);
</script>

<center>
<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
?>
<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['role']; ?></td>
    
    <td>
    <?php 
    if($row['status'] == 'active'): ?>
        <span class="status-active">Active</span>
    <?php else: ?>
        <span class="status-inactive">Inactive</span>
    <?php endif; ?>
    </td>

    <td>
        <a href="delete_employee.php?id=<?= $row['id']; ?>" class="btn-delete">Delete</a>
        <a href="edit_employee.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
    </td>
</tr>
<?php
    }
}else{
?>
<tr>
    <td colspan="6" style="text-align:center;">No employees found</td>
</tr>
<?php } ?>

</table>
</center>


<?php include 'footer.php'; ?>

</body>
</html>