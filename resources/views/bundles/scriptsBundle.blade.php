<!---------------------------------- SCRIPTS BUNDLE --------------------------------------->
<script src="https://kit.fontawesome.com/a33ff0e6b1.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="{{asset('/js/windowControl.js')}}"></script>
<script src="{{asset('/js/validation.js')}}"></script>
<script src="{{asset('/js/ripple.js')}}"></script>
<script src="{{asset('/js/cart.js')}}"></script>
<script src="{{asset('/js/storeOverlay.js')}}"></script>
<script src="{{asset('/js/statisticOverlay.js')}}"></script>
<script src="{{asset('/js/messageNotif.js')}}"></script>
<script src="{{asset('/js/slider.js')}}"></script>
<script src="{{asset('/js/potionNotification.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@5.5.1/dist/simpleParallax.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        // Vérifier si nous sommes sur la page de connexion
        if (window.location.pathname === '/login') {
            // Récupérer les dimensions de la fenêtre
            const windowWidth = window.innerWidth;
            const windowHeight = window.innerHeight;

            // Positionner le curseur au centre de l'écran
            window.scrollTo(windowWidth / 2, windowHeight / 2);
        }
    });
</script>

<!----------------------------------------------------------------------------------------->
