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
            })
            .catch(error => console.error('Erreur lors du chargement de la section:', error));
    }
    
    

    $(document).on("click", ".interet-tag", function () {
        const tagId = $(this).data('id');
        if ($(this).hasClass('interet-selected')) {
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
