// MENU
function toggleMenu(){
  document.getElementById("navMenu").classList.toggle("active");
}
// cart count
let count = 0;
function addToCart(){
  document.getElementById("cart-count").innerText = ++count;
}

//scroll animation
window.addEventListener("scroll", function(){
  document.querySelectorAll(".feature").forEach(feature => {
    let position = feature.getBoundingClientRect().top;
    let screen = window.innerHeight;

    if(position < screen - 100){
      feature.style.opacity = 1;
      feature.style.transform = "translateY(0)";
    }
  });
});

// form validation
document.getElementById("contactForm").addEventListener("submit", function(e){

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const message = document.getElementById("message").value.trim();

  if(!name || !email || !message){
    e.preventDefault();
    alert("Please fill all fields!");
    return;
  }

  alert("✅ Message sent successfully!");
});