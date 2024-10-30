/******/ (() => { // webpackBootstrap
/*!*************************************!*\
  !*** ./resources/js/resendEmail.js ***!
  \*************************************/
function handleSubmit(event) {
  event.preventDefault();
  fetch("{{ route('verification.resend') }}", {
    method: "POST",
    headers: {
      "X-CSRF-TOKEN": "{{ csrf_token() }}",
      "Content-Type": "application/json"
    },
    body: JSON.stringify({})
  }).then(function (response) {
    if (response.ok) {
      document.getElementById('originalMessage').style.display = 'none';
      document.getElementById('successMessage').style.display = 'block';
      console.log("Email de vérification renvoyé avec succès.");
    } else {
      console.error("Échec de l'envoi de l'email de vérification.");
    }
  })["catch"](function (error) {
    return console.error("Erreur réseau:", error);
  });
}
function closeVerificationModal() {
  closeModal('emailVerificationModal');
  document.getElementById('originalMessage').style.display = 'block';
  document.getElementById('successMessage').style.display = 'none';
}
/******/ })()
;