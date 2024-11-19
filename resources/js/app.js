document.addEventListener("DOMContentLoaded", function () {
    // Sélectionner les boutons de connexion et d'inscription
    const loginBtn = document.getElementById("loginBtn");
    const signUpBtn = document.getElementById("signUpBtn");

    // Fonction pour ouvrir l'overlay
    function openOverlay() {
        document.getElementById("loginOverlay").style.display = "flex";
    }

    // Ouvrir le modal au clic sur "Connexion"
    if (loginBtn) {
        loginBtn.addEventListener("click", function () {
            openOverlay();
            showLogin(); // Afficher le formulaire de connexion
        });
    }

    // Ouvrir le modal au clic sur "Créer un compte"
    if (signUpBtn) {
        signUpBtn.addEventListener("click", function () {
            openOverlay();
            showSignUp(); // Afficher le formulaire d'inscription
        });
    }

    // Fonction pour afficher le formulaire de connexion
    function showLogin() {
        document.getElementById("loginForm").style.display = "block";
        document.getElementById("signUpForm").style.display = "none";
    }

    // Fonction pour afficher le formulaire d'inscription
    function showSignUp() {
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("signUpForm").style.display = "block";
    }

    // Fonction pour fermer l'overlay
    function closeOverlay() {
        document.getElementById("loginOverlay").style.display = "none";
    }

    // Attacher l'événement de fermeture à l'overlay
    document.querySelector('.close').addEventListener('click', closeOverlay);
});

/*var timer = null;

function showMessage(message) {
    if(timer !== null)
        clearTimeout( timer );

    if($('body').find('.flash-message').length > 0)
        $('.flash-message').slideUp("normal", function() { $(this).remove(); } );
    $('body').append('<div class="flash-message"><p>' + message + '</p> </div>')

    timer = setTimeout(function() {
        $('.flash-message').slideUp("normal", function() { $(this).remove(); } );
    }, 3500);
}

function showError(message) {
    if(timer !== null)
        clearTimeout( timer );

    if($('body').find('.flash-message').length > 0)
        $('.flash-message').slideUp("normal", function() { $(this).remove(); } );
    $('body').append('<div class="flash-message flash-message-error"><p>' + message + '</p> </div>')

    timer = setTimeout(function() {
        $('.flash-message').slideUp("normal", function() { $(this).remove(); } );
    }, 3500);
}*/