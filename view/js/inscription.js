document.addEventListener("DOMContentLoaded", function (event) {
    var form = document.querySelector(".inscription form");
    var inscrire = form.querySelector("button.inscrire");
    inscrire.style.display = "none";
    form.querySelector(".donnees-adresse").style.display = "none";
    form.querySelector(".donnees-connection").style.display = "none";
    var next = form.querySelector("button.next");
    var retour = form.querySelector("button.retour");
    retour.style.display = "none";
    var nbNext = 1;
    var perso =  form.querySelector(".donnees-personnels");
    var connection = form.querySelector(".donnees-connection");
    var adresse = form.querySelector(".donnees-adresse");

    next.addEventListener("click", function () {
        /* if (nbNext == 0) {
           
            nbNext++;
        } */
       
        if (nbNext == 1) {
            inscrire.style.display = "none";
            next.style.display = "block";
            perso.style.display = "none";
            connection.style.display = "none";
            adresse.style.display = "block";
            retour.style.display = "block";
            nbNext++;
            return;
        }
        if (nbNext == 2) {
            inscrire.style.display = "block";
            perso.style.display = "none";
            connection.style.display = "block";
            adresse.style.display = "none";
            next.style.display = "none";
            retour.style.display = "block";
            nbNext++;
            return;
        }
        if (nbNext == 3) {
            console.log("fini l'inscription");
            nbNext = 0;
            return;
        }
    });
    retour.addEventListener("click", function () {
        if (nbNext == 2) {
            inscrire.style.display = "none";
            adresse.style.display = "none";
            connection.style.display = "none";
            perso.style.display = "block";
            next.style.display = "block";
            retour.style.display = "none";
            nbNext--;
        }
        if (nbNext == 3) {
            inscrire.style.display = "none";
            adresse.style.display = "block";
            connection.style.display = "none";
            perso.style.display = "none";
            next.style.display = "block";
            retour.style.display = "block";
            nbNext--;
        }
    });
});