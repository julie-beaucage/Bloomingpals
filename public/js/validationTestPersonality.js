/******/ (() => { // webpackBootstrap
/*!***************************************************!*\
  !*** ./resources/js/validationTestPersonality.js ***!
  \***************************************************/
window.validateForm = function () {
  document.getElementById('error-message').style.display = 'none';
  var questions = document.querySelectorAll('fieldset');
  var allAnswered = true;
  var selectedAnswers = [];
  questions.forEach(function (question) {
    var radios = question.querySelectorAll('input[type="radio"]');
    var isChecked = false;
    radios.forEach(function (radio) {
      if (radio.checked) {
        isChecked = true;
        selectedAnswers.push({
          questionId: question.querySelector('legend').innerText,
          answer: radio.nextElementSibling.innerText
        });
        console.log("Question répondue : " + radio.nextElementSibling.innerText);
        question.classList.add('selected-question');
        var nextQuestion = question.nextElementSibling;
        if (nextQuestion) {
          nextQuestion.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
          });
        }
      }
    });
    if (!isChecked) {
      question.classList.remove('selected-question');
      allAnswered = false;
    }
  });
  if (!allAnswered) {
    document.getElementById('error-message').innerText = "Veuillez répondre à toutes les questions.";
    document.getElementById('error-message').style.display = 'block';
    console.log("Formulaire non valide.");
    return false;
  }
  console.log("Réponses sélectionnées :", selectedAnswers);
  console.log("Formulaire valide. Mais l'envoi est bloqué pour les tests.");
  return true;
};
document.querySelectorAll('input[type="radio"]').forEach(function (radio) {
  radio.addEventListener('change', function () {
    var questionFieldset = this.closest('fieldset');
    questionFieldset.classList.add('selected-question');
    var nextQuestion = questionFieldset.nextElementSibling;
    if (nextQuestion) {
      nextQuestion.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
      });
    }
  });
});
/******/ })()
;