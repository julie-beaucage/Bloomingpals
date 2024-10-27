// modal.js

document.addEventListener('DOMContentLoaded', function () {
    function toggleModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            if (modal.style.display === 'flex') {
                modal.style.display = 'none'; 
                console.log(`Modal ${modalId} fermé`);
            } else {
                modal.style.display = 'flex'; 
                console.log(`Modal ${modalId} ouvert`);
            }
        } else {
            console.error(`Modal avec l'ID ${modalId} introuvable.`);
        }
    }
    $(document).on("click", "#openProfileOverlay", function () {
        toggleModal("overlayProfile"); 
    });

    $(document).on("click", "#openInterestOverlay", function () {
        toggleModal("overlayInterests"); 
    });

    const closeButtons = document.querySelectorAll('.close');
    closeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const modalId = this.closest('.custom-overlay').id; 
            toggleModal(modalId); 
        });
    });
});
