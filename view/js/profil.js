var liens = ["my-events", "find-events", "contribution", "edit-profil", "gerer"];

var profil = document.querySelector(".profil");
var sections = document.querySelectorAll("article section");
var section = document.querySelector(".listeLiens");

for (let sec of sections) {
    if (sec != section) {
        sec.style.display = "none";
    }
}
profil.querySelector('section.my-events').style.display = "block";

for (let lien of liens) {
    section.querySelector('a#' + lien).addEventListener("click", function () {
        for (let a of profil.querySelectorAll('section a')) {
            a.classList.remove("active");
        }
        this.classList.add("active");
        for (let sec of sections) {
            if (sec != section) {
                sec.style.display = "none";
                sec.classList.remove("active");
            }
            profil.querySelector("section." + lien).style.display = "block";
            profil.querySelector("section." + lien).classList.add("active");
        }
    });
}