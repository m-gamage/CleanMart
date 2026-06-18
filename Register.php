<?php
include 'db.php';

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirmPassword'];

    if($password == $confirm){
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name,email,password)
                VALUES ('$name','$email','$hashed')";

        if($conn->query($sql)){
            echo "<script>alert('Registration Successful'); window.location='login.php';</script>";
        } else {
            echo "<script>alert('Error');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register - CleanMart</title>

<link rel="stylesheet" href="registerstyle.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

<div class="register-container">

  <div class="register-box">

    <h2><span class="clean">Clean</span><span class="mart">Mart</span></h2>
    <p class="tagline">Create your account </p>

    <form method="POST">

      <div class="input-box">
        <input type="text" name="name" required>
        <label>Full Name</label>
      </div>

      <div class="input-box">
        <input type="email" name="email" required>
        <label>Email</label>
      </div>

      <div class="input-box">
        <input type="password" name="password" required>
        <label>Password</label>
      </div>

      <div class="input-box">
        <input type="password" name="confirmPassword" required>
        <label>Confirm Password</label>
      </div>

      <button type="submit" name="register">Register</button>

      <p class="extra">
        Already have an account? <a href="login.php">Login</a>
      </p>

    </form>

  </div>

</div>
</body>
</html>

<script>
  document.getElementById("registerForm").addEventListener("submit", function(e){

e.preventDefault();

let name = document.getElementById("name").value;
let email = document.getElementById("email").value;
let password = document.getElementById("password").value;
let confirmPassword = document.getElementById("confirmPassword").value;

//Validation

if(name === "" || email === "" || password === "" || confirmPassword === ""){
alert("Please fill all fields!");
return;
}

if(password.length < 4){
alert("Password must be at least 4 characters!");
return;
}

if(password !== confirmPassword){
alert("Passwords do not match!");
return;
}

// Success
alert("Registration Successful 🎉");
window.location.href = "login.html";

});
</script>