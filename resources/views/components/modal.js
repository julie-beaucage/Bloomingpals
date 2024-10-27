// modal.js

// Assurez-vous que le DOM est complètement chargé
document.addEventListener('DOMContentLoaded', function () {
    console.log("modal.js chargé");

    // Fonction pour afficher ou fermer un modal
    function toggleModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            if (modal.style.display === 'flex') {
                modal.style.display = 'none'; // Ferme le modal si déjà ouvert
                console.log(`Modal ${modalId} fermé`);
            } else {
                modal.style.display = 'flex'; // Ouvre le modal
                console.log(`Modal ${modalId} ouvert`);
            }
        } else {
            console.error(`Modal avec l'ID ${modalId} introuvable.`);
        }
    }

    // Écouteurs d'événements pour ouvrir les overlays
    $(document).on("click", "#openProfileOverlay", function () {
        toggleModal("overlayProfile"); // Ouvre ou ferme le modal pour le profil
    });

    $(document).on("click", "#openInterestOverlay", function () {
        toggleModal("overlayInterests"); // Ouvre ou ferme le modal pour les intérêts
    });

    // Écouteurs d'événements pour les boutons de fermeture des modals
    const closeButtons = document.querySelectorAll('.close');
    closeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const modalId = this.closest('.custom-overlay').id; // Récupère l'ID du modal parent
            toggleModal(modalId); // Ferme le modal
        });
    });
});
