/******/ (() => { // webpackBootstrap
/*!***************************************************!*\
  !*** ./resources/js/validationTestPersonality.js ***!
  \***************************************************/
// Fonction pour valider le formulaire
window.validateForm = function () {
  document.getElementById('error-message').style.display = 'none'; // Masquer le message d'erreur au début
  var questions = document.querySelectorAll('fieldset');
  var allAnswered = true;

  // Réinitialiser les styles de chaque question
  questions.forEach(function (question) {
    question.classList.remove('error'); // Supprime la classe d'erreur pour chaque question
  });
  questions.forEach(function (question) {
    var radios = question.querySelectorAll('input[type="radio"]');
    var isChecked = false;
    radios.forEach(function (radio) {
      if (radio.checked) {
        isChecked = true;
        question.classList.add('selected-question'); // Ajoute une classe pour la question sélectionnée
      }
    });
    if (!isChecked) {
      question.classList.add('error'); // Ajoute une classe d'erreur pour les questions non répondues
      allAnswered = false; // Marque que toutes les questions ne sont pas répondues
    }
  });
  if (!allAnswered) {
    var errorMessage = document.getElementById('error-message');
    errorMessage.innerText = "Veuillez répondre à toutes les questions."; // Définit le message d'erreur
    errorMessage.style.display = 'block'; // Affiche le message d'erreur
    console.log("Formulaire non valide.");
    return false;
  }
  console.log("Formulaire valide.");
  return true;
};

// Événements de navigation
document.querySelectorAll('.prev, .next').forEach(function (link) {
  link.addEventListener('click', function (event) {
    event.preventDefault(); // Empêche le lien de s'exécuter immédiatement
    if (validateForm()) {
      // Valide avant de changer de page
      window.location.href = this.href; // Navigue vers la page suivante
    }
  });
});
/******/ })()
;