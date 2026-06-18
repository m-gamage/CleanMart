//product view
function viewProduct(id){
    window.location.href = "product-detail.html?id=" + id;
}

//filter
function filterProducts(category){
    let cards = document.querySelectorAll(".product-card");

    cards.forEach(card => {
        if(category === "all" || card.classList.contains(category)){
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}


//Search
document.getElementById("search").addEventListener("keyup",function(){
    let value = this.value.toLowerCase();
    let cards = document.querySelectorAll(".product-card");

    cards.forEach(card =>{
        let title = card.querySelector("h3").innerText.toLowerCase();
        card.style.display = title.includes(value) ? "block" : "none";
    });
});