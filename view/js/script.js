menu = document.querySelector('header .menu');

menu.addEventListener("click", function () {
    icon = menu.querySelector('.fas');
    navbar = document.querySelector('header nav');

    if (menu.style.borderRadius === "50%") {
        menu.style.borderRadius = "5px";
        console.log("to 5px");
    } else {
        menu.style.borderRadius = "50%";
        console.log("to 50%");
    }

    icon.classList.toggle("fa-times");
    icon.classList.toggle("fa-bars");
    navbar.classList.toggle("mobile-display-none");


});