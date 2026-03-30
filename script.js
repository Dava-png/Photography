let isSticky = false; 

window.addEventListener("scroll", function () {
    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 0 && !isSticky) {
        navbar.classList.add("sticky");
        isSticky = true;       
    } 
    else if (window.scrollY <= 0 && isSticky) {
        navbar.classList.remove("sticky");
        isSticky = false;     
    }
});

function setPembelian(gambar) {
  document.querySelector(".preview-img").src = gambar;
}



