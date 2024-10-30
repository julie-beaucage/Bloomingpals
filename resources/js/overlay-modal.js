document.addEventListener("DOMContentLoaded", function () {
    function toggleModal(modalId) {
        var modal = document.getElementById(modalId);
        if (modal) {
            if (modal.style.display === "flex") {
                modal.style.display = "none";
                console.log(`Modal ${modalId} fermé`);
            } else {
                modal.style.display = "flex";
                console.log(`Modal ${modalId} ouvert`);
            }
        } else {
            console.error(`Modal avec l'ID ${modalId} introuvable.`);
        }
    }

    $(document).on("click", "#openProfileOverlay", function () {
        toggleModal("overlayProfile");
    });

    $("#profile-content").on("DOMSubtreeModified", function () {
        $(".close").each(function () {
            $(this).click(function () {
                const modalId = $(this).data("modal-id");
                toggleModal(modalId);
            });
        });
    });
});
