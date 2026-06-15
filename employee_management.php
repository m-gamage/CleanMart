<?php
include 'db.php';

/* ---------- Prevent Undefined Variable Errors ---------- */
$action = "";
$totalEmployees = 0;
$activeEmployees = 0;
$inactiveEmployees = 0;

/* ---------- Get Employee Statistics ---------- */

// Total employees
$result = $conn->query("SELECT COUNT(*) AS total FROM employees");
$totalEmployees = $result->fetch_assoc()['total'];

// Active employees
$result = $conn->query("SELECT COUNT(*) AS active FROM employees WHERE status='active'");
$activeEmployees = $result->fetch_assoc()['active'];

// Inactive employees
$result = $conn->query("SELECT COUNT(*) AS inactive FROM employees WHERE status='inactive'");
$inactiveEmployees = $result->fetch_assoc()['inactive'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Management</title>

<!-- REQUIRED FOR HEADER -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" type="text/css" href="employee.css?v=<?php echo filemtime('employee.css'); ?>">
</head>

<body>

<!-- ✅ HEADER -->
<?php include 'header.php'; ?>


<!-- title -->
<h2 class="page-title">Employee Management</h2>

<div class="title-action">
    <a href="add_employee.php" class="add-btn">
        + Add New Employee
    </a>

    <!-- SEARCH BAR -->
    <form action="employee_details.php" method="GET" class="search-form">
        <input 
            type="text" 
            name="search" 
            class="search-bar"
            placeholder="🔍 Search employee"
        >
    </form>
</div>

<hr>

<div class="main-layout">
    
<!-- SIDEBAR -->
<aside class="sidebar">
<ul>
<li><a href="employee_management.php">📊 Dashboard</a></li>
<li><a href="add_employee.php">➕ Add new Employee</a></li>
<li><a href="employee_details.php">👥 Employee Details</a></li>
<li><a href="roles_access.php">🔐 Roles & Access</a></li>
<li><a href="reports.php">📈 Reports & Analytics</a></li>
</ul>
</aside>

<!-- MAIN CONTENT -->
<div class="content">

<?php
/* ================= DASHBOARD ================= */
if($action == "dashboard"){

$total = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT COUNT(*) total FROM employees")
)['total'];

echo "<h3>Dashboard Overview</h3>";
echo "<p>Total Employees: $total</p>";
}
?>

<div class="cards">

<div class="card">
<p>👥 Total employees</p>
<h2><?= $totalEmployees ?></h2>
</div>

<div class="card">
<p>✅ Active employees</p>
<h2><?= $activeEmployees ?></h2>
</div>

<div class="card">
<p>❌ Inactive employees</p>
<h2><?= $inactiveEmployees ?></h2>
</div>

</div>
</div>
</div>

<!-- ✅ FOOTER -->
<?php include 'footer.php'; ?>

<!-- REQUIRED JS FOR HEADER -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function toggleSearch(e) {
    e.preventDefault();
    document.getElementById("searchBar").classList.toggle("active");
}

window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if(window.scrollY > 50){
        navbar.classList.add('shrink');
    } else {
        navbar.classList.remove('shrink');
    }
});
</script>

<script src="employee.js"></script>

</body>
</html>