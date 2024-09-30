
document.addEventListener('DOMContentLoaded', function () {
    const tabLinks = document.querySelectorAll('.tab-link');

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
                    document.getElementById('profile-content').innerHTML = html;
                })
                .catch(error => console.error('Erreur lors du chargement de la section:', error));
        });
    });
});
