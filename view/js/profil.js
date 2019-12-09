document.addEventListener("DOMContentLoaded", function (event) {
    var liens = ["my-events", "find-events", "contribution", "edit-profil", "gerer"];

    var profil = document.querySelector(".profil");
    var sections = document.querySelectorAll("article > section");
    var divLiens = profil.querySelector(".listeLiens");

    for (let sec of sections) {
        sec.style.display = "none";
    }
    profil.querySelector('section.my-events').style.display = "block";

    for (let lien of liens) {
        if (divLiens.querySelector('a#' + lien) != null) {

            divLiens.querySelector('a#' + lien).addEventListener("click", function () {
                for (let a of divLiens.querySelectorAll('a')) {
                    a.classList.remove("active");
                }
                this.classList.add("active");
                for (let sec of sections) {
                    sec.style.display = "none";
                    profil.querySelector("section." + lien).style.display = "block";
                }
            });
        }
    }
    var modifier = document.querySelector(".edit");
    modifier.addEventListener("click", function () {
        for (let lien of liens) {
            if (divLiens.querySelector('a#' + lien) != null) {

                for (let a of divLiens.querySelectorAll('a')) {
                    a.classList.remove("active");
                }
            }
        }
        divLiens.querySelector('a#edit-profil').classList.add("active");
        for (let sec of sections) {
            sec.style.display = "none";
        }
        profil.querySelector("section.edit-profil").style.display = "block";

    });
    var errMdp = document.querySelector(".errMdp");
    errMdp.style.display = "none";

});
function validateMdp() {
    var form = document.querySelector("form.form-edit");
    var compte = form.querySelector(".information-compte");
    var errMdp = compte.querySelector(".errMdp");
    console.log("ok");
    if (compte.querySelector("#mdp").value != "" && compte.querySelector("#Cmdp").value != "") {
        if (compte.querySelector("#mdp").value != compte.querySelector("#Cmdp").value) {
            errMdp.style.display = "block";
            return false;
            
        }
        else {
            errMdp.style.display = "none";
            return true;
        }
    }
}