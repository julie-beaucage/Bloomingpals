/******/ (() => { // webpackBootstrap
/*!***************************************************!*\
  !*** ./resources/js/validationTestPersonality.js ***!
  \***************************************************/
window.validateForm = function () {
  document.getElementById('error-message').style.display = 'none';
  var questions = document.querySelectorAll('fieldset');
  var allAnswered = true;
  questions.forEach(function (question) {
    question.classList.remove('error');
  });
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
      question.classList.add('error');
      allAnswered = false;
    }
  });
  if (!allAnswered) {
    var errorMessage = document.getElementById('error-message');
    errorMessage.innerText = "Veuillez répondre à toutes les questions.";
    errorMessage.style.display = 'block';
    return false;
  }
  return true;
};

// Écouter le changement de réponse dans les questions
document.querySelectorAll('input[type="radio"]').forEach(function (radio) {
  radio.addEventListener('change', function () {
    var questionFieldset = this.closest('fieldset');
    questionFieldset.classList.add('selected-question'); // Marquer la question comme répondue

    var nextQuestion = questionFieldset.nextElementSibling;
    if (nextQuestion) {
      nextQuestion.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
      });
    }
  });
});

// Ajouter un écouteur d'événements pour les boutons de pagination et de soumission
document.querySelectorAll('.prev, .next, .sendTest').forEach(function (button) {
  button.addEventListener('click', function (event) {
    if (!window.validateForm()) {
      event.preventDefault();
    }
  });
});
/******/ })()
;