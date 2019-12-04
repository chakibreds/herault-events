var liens = ["my-events","find-events","contribution",];
var sections = document.querySelectorAll("section");
var section = document.querySelector("section.liste-liens"); 
console.log(sections);
for (const sec of sections) {
    if (sec != section) {
        sec.style.display = "none";
    }   
}
for (const lien of liens) {
      section.querySelector("#"+lien).addEventListener("click",function () {
        for (const sec of sections) {
            if (sec != section) {
                sec.style.display = "none";
                sec.classList.remove("active");
            }
           sec.querySelector("."+lien).style.display = "block";
           sec.querySelector("."+lien).classList.add("active");
        }
    });
}