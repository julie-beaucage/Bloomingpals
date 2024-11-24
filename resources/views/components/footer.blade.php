
<footer class="footer-container" id="footer">
        <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100" preserveAspectRatio="none">
            <path class="footer-wave-path" d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3
            C276.7,2.9,330,4,383,9.8c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z"></path>
        </svg>
        <div class="footer-content">
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="{{ route('home') }}">Accueil</a></li>
                <li class="menu__item"><a class="menu__link" href="{{ route('about') }}">À propos</a></li>
                <li class="menu__item"><a class="menu__link" href="{{ route('faq') }}">FAQ</a></li>
                <li class="menu__item"><a class="menu__link" href="{{ route('personality-info') }}">Personnalités</a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} BloomingPals, Tous droits réservés.</p>
        </div>
</footer>

