// MODIFY

// Sélectionner le bouton modify
let modifyBtn = document.querySelector(".modifyBtn");
// Sélectionner la boîte modale de modify
let profileModal = document.querySelector(".modal");
// Sélectionner la croix pour fermer la boîte modale de modify
let profileCloseBtn = document.querySelector(".close");

// Ouvrir la boîte modale de modification lorsqu'on clique sur le bouton "modify"
modifyBtn.addEventListener("click", function() {
profileModal.style.display = "block";
});

// Fermer la boîte modale de modification lorsqu'on clique sur la croix
profileCloseBtn.addEventListener("click", function() {
profileModal.style.display = "none";
});

// Fermer la boîte modale lorsqu'on clique en dehors de la boîte modale
window.addEventListener("click", function(event) {
if (event.target == profileModal) {
profileModal.style.display = "none";
}
});

