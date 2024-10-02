document.addEventListener('DOMContentLoaded', function () {
    const tabLinks = document.querySelectorAll('.tab-link');

    if (tabLinks.length === 0) {
        console.error('Aucun onglet trouvé.');
        return;
    }

    function loadInterets() {
        const interestsTabLink = document.querySelector('.tab-link.active');
        if (interestsTabLink) {
            const url = interestsTabLink.getAttribute('href'); 

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur réseau: ' + response.status);
                    }
                    return response.text();
                })
                .then(html => {
                    const profileContent = document.getElementById('profile-content');
                    if (profileContent) {
                        profileContent.innerHTML = html;
                    } else {
                        console.error('Élément profile-content introuvable.');
                    }
                })
                .catch(error => console.error('Erreur lors du chargement de la section:', error));
        }
    }

    loadInterets();

    tabLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            tabLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');

            const url = this.getAttribute('href');

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur réseau: ' + response.status);
                    }
                    return response.text();
                })
                .then(html => {
                    const profileContent = document.getElementById('profile-content');
                    if (profileContent) {
                        profileContent.innerHTML = html;
                    } else {
                        console.error('Élément profile-content introuvable.');
                    }
                })
                .catch(error => console.error('Erreur lors du chargement de la section:', error));
        });
    });

    $(document).on("click", "#openOverlay", function () {
        console.log("Bouton Modifier cliqué.");
        $("#overlay").css("display", "block"); 
    });

    $(document).on("click", ".closeOverlayBtn", function () {
        console.log("Fermeture de l'overlay.");
        $("#overlay").css("display", "none"); 
    });

    $(document).on("click", ".interet-tag", function () {
        const tagId = $(this).data('id');
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
        const selectedIds = Array.from(document.querySelectorAll('.interet-tag.interet-selected'))
                                 .map(tag => tag.getAttribute('data-id'));
        $('#interetSelectedInterets').val(selectedIds.join(',')); 
    }
});
