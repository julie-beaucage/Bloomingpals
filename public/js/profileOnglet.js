/******/ (() => { // webpackBootstrap
/*!***************************************!*\
  !*** ./resources/js/profileOnglet.js ***!
  \***************************************/
document.addEventListener('DOMContentLoaded', function () {
  var tabLinks = document.querySelectorAll('.tab-link');
  var activeTab = document.querySelector('.tab-link.active');
  var urlParams = new URLSearchParams(window.location.search);
  var activeTabParam = urlParams.get('tab');
  if (activeTabParam) {
    tabLinks.forEach(function (link) {
      return link.classList.remove('active');
    });
    var selectedTab = document.querySelector(".tab-link[data-target=\"".concat(activeTabParam, "\"]"));
    if (selectedTab) {
      selectedTab.classList.add('active');
      loadTabContent(selectedTab.getAttribute('href'));
    }
  } else if (!activeTab) {
    var interestsTabLink = document.querySelector('.tab-link[href*="interets/interets"]');
    if (interestsTabLink) {
      interestsTabLink.classList.add('active');
      loadTabContent(interestsTabLink.getAttribute('href'));
    }
  }
  tabLinks.forEach(function (link) {
    link.addEventListener('click', function (event) {
      event.preventDefault();
      tabLinks.forEach(function (link) {
        return link.classList.remove('active');
      });
      this.classList.add('active');
      var url = this.getAttribute('href');
      loadTabContent(url);
      var tabTarget = this.getAttribute('data-target');
      var newUrl = new URL(window.location.href);
      newUrl.searchParams.set('tab', tabTarget);
      window.history.pushState({}, '', newUrl);
    });
  });
  function loadTabContent(url) {
    fetch(url).then(function (response) {
      if (!response.ok) {
        throw new Error('Erreur réseau: ' + response.status);
      }
      return response.text();
    }).then(function (html) {
      var profileContent = document.getElementById('profile-content');
      if (profileContent) {
        profileContent.innerHTML = html;
      } else {
        console.error('Élément profile-content introuvable.');
      }
    })["catch"](function (error) {
      return console.error('Erreur lors du chargement de la section:', error);
    });
  }
  $(document).on("click", "#openOverlay", function () {
    console.log("Bouton Modifier cliqué.");
    $("#overlay").css("display", "block");
  });
  $(document).on("click", ".closeOverlayBtn", function () {
    console.log("Fermeture de l'overlay.");
    $("#overlay").css("display", "none");
  });
  $(document).on("click", ".interet-tag", function () {
    var tagId = $(this).data('id');
    console.log("Tag d'intérêt cliqué :", $(this).text());
    if ($(this).hasClass('interet-selected')) {
      console.log("Il était déjà sélectionné. Désélectionné :", tagId);
    } else {
      console.log("Sélectionné :", tagId);
    }
    $(this).toggleClass('interet-selected');
    updateSelectedInterets();
  });
  function updateSelectedInterets() {
    var selectedIds = Array.from(document.querySelectorAll('.interet-tag.interet-selected')).map(function (tag) {
      return tag.getAttribute('data-id');
    });
    $('#interetSelectedInterets').val(selectedIds.join(','));
  }
});
/******/ })()
;