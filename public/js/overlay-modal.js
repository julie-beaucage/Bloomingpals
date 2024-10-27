/******/ (() => { // webpackBootstrap
/*!***************************************!*\
  !*** ./resources/js/overlay-modal.js ***!
  \***************************************/
// modal.js

document.addEventListener('DOMContentLoaded', function () {
  function toggleModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
      if (modal.style.display === 'flex') {
        modal.style.display = 'none';
        console.log("Modal ".concat(modalId, " ferm\xE9"));
      } else {
        modal.style.display = 'flex';
        console.log("Modal ".concat(modalId, " ouvert"));
      }
    } else {
      console.error("Modal avec l'ID ".concat(modalId, " introuvable."));
    }
  }
  $(document).on("click", "#openProfileOverlay", function () {
    toggleModal("overlayProfile");
  });
  $(document).on("click", "#openInterestOverlay", function () {
    toggleModal("overlayInterests");
  });
  var closeButtons = document.querySelectorAll('.close');
  closeButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      var modalId = this.closest('.custom-overlay').id;
      toggleModal(modalId);
    });
  });
});
/******/ })()
;