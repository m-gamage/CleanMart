<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Admin Login
    if($email == "admin@cleanmart.com" && $password == "admin123"){

        $_SESSION['role'] = "admin";
        $_SESSION['name'] = "Admin";

        header("Location:index.php");
        exit();

    }

    // User Login
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){

    $row = $result->fetch_assoc();

    if(password_verify($password, $row['password'])){

        $_SESSION['role'] = "user";
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];

        header("Location:index.php");
        exit();

    } else {

        echo "<script>alert('Invalid Password');</script>";

    }

    } else {

    echo "<script>alert('Invalid Email');</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - CleanMart</title>

<link rel="stylesheet" href="loginstyle.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>

<div class="login-container">

  <div class="login-box">

    <h2><span class="clean">Clean</span><span class="mart">Mart</span></h2>
    <p class="tagline">Quality Cleaning Starts Here </p>

    <form method="POST">

      <div class="input-box">
        <input type="email" name="email" required>
        <label>Email</label>
      </div>

      <div class="input-box">
        <input type="password" name="password" required>
        <label>Password</label>
      </div>

      <button type="submit" name="login">Login</button>

      <p class="extra">
        Don't have an account? <a href="register.php">Register</a>
      </p>

    </form>

  </div>

</div>
</body>
</html>

<script>
  window.onload = function(){

    let form = document.getElementById("loginForm");

    form.addEventListener("submit", function(e){

        e.preventDefault();

        let email = document.getElementById("email").value;
        let password = document.getElementById("password").value;

        if(email === "" || password === ""){
            alert("Please fill all fields!");
            return;
        }

        if(email === "m@gmail.com" && password === "1234"){

            // save data
            localStorage.setItem("username", "Indumini");
            localStorage.setItem("email", email);

            alert("Login Successful 🎉");

            // redirect
            window.location.href = "dashboard.html";

        }else{
            alert("Invalid Email or Password ❌");
        }

    });

};
</script>