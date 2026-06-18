//menu icon
function toggleMenu(){
  const menu = document.getElementById("navMenu");
  menu.style.display = menu.style.display === "flex" ? "none" : "flex";
  menu.classList.toggle("active");
}
//cart icon
let count=0;
function addToCart(){
  count++;
  document.getElementById("cart-count").innerText=count;
}
