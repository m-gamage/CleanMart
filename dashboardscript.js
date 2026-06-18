// check login
if (!localStorage.getItem("username")) {
    window.location.href = "login.html";
}

window.onload = () => {

    // profile pic load
    const profilePic = document.getElementById("profilePic");
    const savedPic = localStorage.getItem("profilePic");

    if (savedPic) profilePic.src = savedPic;

    // upload image
    document.getElementById("uploadPic").addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();

        reader.onload = () => {
            const imageData = reader.result;
            profilePic.src = imageData;
            localStorage.setItem("profilePic", imageData);
        };

        reader.readAsDataURL(file);
    });

    // user data
    const name = localStorage.getItem("username");
    const email = localStorage.getItem("email");

    if (name) document.getElementById("name").innerHTML = `<strong>Name:</strong> ${name}`;
    if (email) document.getElementById("email").innerHTML = `<strong>Email:</strong> ${email}`;

    // default active menu
    document.querySelectorAll(".menu li")[0].classList.add("active");
};


// section switch
function showSection(section, el) {

    document.querySelectorAll(".card").forEach(card => {
        card.style.display = "none";
    });

    document.getElementById(section).style.display = "block";

    document.querySelectorAll(".menu li").forEach(item => {
        item.classList.remove("active");
    });

    el.classList.add("active");
}


// logout
function logout() {
    localStorage.clear();
    window.location.href = "login.html";
}