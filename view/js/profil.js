var liens = ["my-events", "find-events", "contribution", "edit-profil", "gerer"];

var profil = document.querySelector(".profil");
var sections = document.querySelectorAll("article section");
var divLiens = document.querySelector(".listeLiens");

for (let sec of sections) {
    sec.style.display = "none";
}
profil.querySelector('section.my-events').style.display = "block";

for (let lien of liens) {
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