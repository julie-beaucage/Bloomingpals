document.addEventListener('DOMContentLoaded', function () {
    const tabLinks = document.querySelectorAll('.tab-link');
    let activeTab = document.querySelector('.tab-link.active');

    const urlParams = new URLSearchParams(window.location.search);
    const activeTabParam = urlParams.get('tab');

    if (activeTabParam) {
        tabLinks.forEach(link => link.classList.remove('active'));

        const selectedTab = document.querySelector(`.tab-link[data-target="${activeTabParam}"]`);
        if (selectedTab) {
            selectedTab.classList.add('active');
            loadTabContent(selectedTab.getAttribute('href'));
        }
    } else if (!activeTab) {
        const interestsTabLink = document.querySelector('.tab-link[href*="interets/interets"]');
        if (interestsTabLink) {
            interestsTabLink.classList.add('active');
            loadTabContent(interestsTabLink.getAttribute('href'));
        }
    }
    $("#openReport").on("click", function () {
        console.log("Bouton signalé cliqué.");
        $("#reportPanel").css("display", "flex");
    });

    tabLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            
            tabLinks.forEach(link => link.classList.remove('active'));
            this.classList.add('active');

            const url = this.getAttribute('href');
            loadTabContent(url);

            const tabTarget = this.getAttribute('data-target');
            const newUrl = new URL(window.location.href);
            newUrl.searchParams.set('tab', tabTarget);
            window.history.pushState({}, '', newUrl);
        });
    });

    function loadTabContent(url) {
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erreur réseau: ' + response.status);
                }
                return response.text();
            })
            .then(data => {
                var parser = new DOMParser();
                var html = parser.parseFromString(data, 'text/html');
    
                var overlayCntr = document.getElementById('profile-overlay-cntr');
                if (!overlayCntr) {
                    console.error("Élément 'profile-overlay-cntr' introuvable.");
                    return; 
                }
    
                var overlays = html.getElementsByClassName('custom-overlay');
                for (var i = 0; i < overlays.length; i++) { 
                    overlayCntr.innerHTML += overlays[i].outerHTML;
                    overlays[i].remove();
                }
    
                var profileContent = document.getElementById('profile-content');
                if (profileContent) {
                    profileContent.innerHTML = html.querySelector("body").innerHTML;
                } else {
                    console.error("Élément 'profile-content' introuvable.");
                }
                if (isInterestsTabActive()) {
                    initSearchInterest(); 
                    setupTagSelection(); 
                }
            })
            .catch(error => console.error('Erreur lors du chargement de la section:', error));
    }

    function isInterestsTabActive() {
        const interestsTabLink = document.querySelector('.tab-link[href*="interets/interets"]');
        return interestsTabLink && interestsTabLink.classList.contains('active');
    }

    // Fonction pour initialiser la barre de recherche
    function initSearchInterest() {
        const searchInput = document.getElementById('searchInterests');
        
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const searchValue = searchInput.value.toLowerCase();
                const tags = document.querySelectorAll('.interet-tag');

                tags.forEach(function (tag) {
                    const tagText = tag.textContent.toLowerCase();
                    if (tagText.includes(searchValue)) {
                        tag.style.display = '';
                    } else {
                        tag.style.display = 'none';
                    }
                });
            });
        } else {
            console.error("L'élément #searchInterests n'a pas été trouvé.");
        }
    }

    function setupTagSelection() {
        const tags = document.querySelectorAll('.interet-tag');
        
        tags.forEach(function (tag) {
            tag.addEventListener('click', function () {
                const tagId = this.dataset.id;

                if (!this.classList.contains('interet-selected')) {
                    this.classList.add('interet-selected');
                } else {
                    this.classList.remove('interet-selected');
                }
                updateSelectedInterets(); 
            });
        });
    }

    function updateSelectedInterets() {
        const selectedIds = Array.from(document.querySelectorAll('.interet-tag.interet-selected'))
                                 .map(tag => tag.getAttribute('data-id'));
        $('#interetSelectedInterets').val(selectedIds.join(',')); 
    }
});
