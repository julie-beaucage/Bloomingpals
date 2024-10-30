/******/ (() => { // webpackBootstrap
/*!***************************************!*\
  !*** ./resources/js/overlay-modal.js ***!
  \***************************************/
document.addEventListener("DOMContentLoaded", function () {
  function toggleModal(modalId) {
    var modal = document.getElementById(modalId);
    if (modal) {
      if (modal.style.display === "flex") {
        modal.style.display = "none";
        console.log("Modal ".concat(modalId, " ferm\xE9"));
      } else {
        modal.style.display = "flex";
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
  $("#profile-content").on("DOMSubtreeModified", function () {
    $(".close").each(function () {
      $(this).click(function () {
        var modalId = $(this).data("modal-id");
        toggleModal(modalId);
      });
    });
  });
});
/******/ })()
;