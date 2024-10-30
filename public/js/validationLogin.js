/******/ (() => { // webpackBootstrap
/*!*****************************************!*\
  !*** ./resources/js/validationLogin.js ***!
  \*****************************************/
/*function _readOnlyError(r) { throw new TypeError('"' + r + '" is read-only'); }
document.addEventListener('DOMContentLoaded', function () {
  var form_de_login = document.getElementById('signupForm');
  var InputDateNaissance = document.getElementById('date_naissance');
  var passwordInput = document.getElementById('password');
  var passwordConfirmationInput = document.getElementById('password_confirmation');
  form_de_login.addEventListener('submit', function (event) {
    var birthdate = new Date(InputDateNaissance.value);
    var today = new Date();
    var age = today.getFullYear() - birthdate.getFullYear();
    var monthDiff = today.getMonth() - birthdate.getMonth();
    if (monthDiff < 0 || monthDiff === 0 && today.getDate() < birthdate.getDate()) {
      +age, _readOnlyError("age");
    }
    if (age < 15) {
      event.preventDefault();
      alert('Vous devez avoir au moins 15 ans pour vous inscrire.');
    }
  });
});*/
function togglePasswordVisibility() {
  var passwordInput = document.getElementById('password');
  var toggleIcon = document.getElementById('togglePassword').querySelector('i');
  var type = passwordInput.type === 'password' ? 'text' : 'password';
  passwordInput.type = type;
  toggleIcon.classList.toggle('fa-eye', type === 'password');
  toggleIcon.classList.toggle('fa-eye-slash', type === 'text');
}
function togglePasswordConfirmationVisibility() {
  var passwordConfirmationInput = document.getElementById('password_confirmation');
  var toggleIcon = document.getElementById('togglePasswordConfirmation').querySelector('i');
  var type = passwordConfirmationInput.type === 'password' ? 'text' : 'password';
  passwordConfirmationInput.type = type;
  toggleIcon.classList.toggle('fa-eye', type === 'password');
  toggleIcon.classList.toggle('fa-eye-slash', type === 'text');
}
/******/ })()
;