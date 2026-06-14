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