// LOGIN MODAL

// Sélectionner le bouton de connexion
let loginBtn = document.querySelector(".loginBtn");
// Sélectionner la boîte modale de connexion
let loginModal = document.querySelector(".modal");
// Sélectionner la croix pour fermer la boîte modale de connexion
let closeBtn = document.querySelector(".close");


// REGISTER MODAL

// Sélectionner le bouton d'inscription
let registerLink = document.querySelector(".registerLink");
// Sélectionner la boîte modale d'inscription
let registerModal = document.getElementById("registerModal");
// Sélectionner la croix pour fermer la boîte modale d'inscription
let registerClose = document.getElementById("registerClose");

//--------------------//

// LOGIN

// Ouvrir la boîte modale de connexion lorsqu'on clique sur le bouton de connexion
loginBtn.addEventListener("click", function() {
  loginModal.style.display = "block";
});
// Fermer la boîte modale de connexion lorsqu'on clique sur la croix
closeBtn.addEventListener("click", function() {
  loginModal.style.display = "none";
});

// REGISTER

// Ouvrir la boîte modale d'inscription et ferme la boîte de connexion lorsqu'on clique sur le bouton d'inscription

registerLink.addEventListener("click", function() {
  loginModal.style.display = "none";
  registerModal.style.display = "block";
});
// Fermer la boîte modale d'inscription lorsqu'on clique sur la croix
registerClose.addEventListener("click", function() {
  registerModal.style.display = "none";
});
// Fermer la boîte modale lorsqu'on clique en dehors de la boîte modale
window.addEventListener("click", function(event) {
  if (event.target == loginModal) {
    loginModal.style.display = "none";
  } else if (event.target == registerModal) {
    registerModal.style.display = "none";
  }
});


// Check la validité entre registerPassword et confirmPassword 
function validateForm() {
  const password = document.getElementById("registerPassword");
  const confirmPassword = document.getElementById("confirmPassword");

  if (password.value !== confirmPassword.value) {
      alert("Passwords do not match.");
      return false;
  }

  return true;
}