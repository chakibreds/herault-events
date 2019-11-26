document.addEventListener("DOMContentLoaded", function (event) {
    var form = document.querySelector(".inscription form");

    var next = form.querySelector("button.next");
    var nbNext = 0;
    next.addEventListener("click", function () {
        if (nbNext == 0) {
            let inscrire = form.querySelector("button .inscrire").style.display = "none";
            form.querySelector(".donnees-adresse").style.display = "none";
            form.querySelector(".donnees-connection").style.display = "none";
        }
        if (nbNext == 1) {
            let inscrire = form.querySelector("button .inscrire").style.display = "none";

            form.querySelector(".donnees-personnels").style.display = "none";
            form.querySelector(".donnees-connection").style.display = "none";
            form.querySelector(".donnees-adresse").style.display = "block";
        }
        if (nbNext == 2) {
            let inscrire = form.querySelector("button .inscrire").style.display = "block";
            form.querySelector(".donnees-personnels").style.display = "none";
            form.querySelector(".donnees-connection").style.display = "block";
            form.querySelector(".donnees-adresse").style.display = "none";
            next.style.display = "none";
        }
        if (nbNext == 3) {
            console.log("fini l'inscription");
        }
    });
});