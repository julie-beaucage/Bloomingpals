<nav class="navigationBar">
    <div class="navContent">
        <div class="menu logoMenu">
            <a class="logo" href="/"><img src="{{asset('images/logo.png')}}" alt="logo" class="logoImage"/>
            <span class="logoText">BloomingPals</span>
            </a>
        </div>

        @auth
            <a href="/cart" class="dropdownCart">
                <span class="cartQt dropdownQt">{{Auth::user()->cartQt()}}</span>
                <i class="fa-solid fa-cart-shopping fa-xl" style="color: #ffffff;"></i>
            </a>
            <label for="dropdownCheck" class="dropdownLabel"><i class="fa-solid fa-bars"></i></label>
        @else
            <label for="dropdownCheck" class="dropdownLabel" style="margin-left: auto;"><i class="fa-solid fa-bars"></i></label>
        @endauth

        <input type="checkbox" class="dropdownCheck" id="dropdownCheck">

        <ul class="menus">
            <li class="menu">
                <a href="/">Accueil</a>
            </li>
            <li class="menu">
                <a href="/store">Boutique</a>
            </li>
            <li class="menu">
                <a href="/panoramix">PanoraMix</a>
            </li>
            <li class="menu">
                <a href="/enigma">Enigma</a>
            </li>
            @auth
            <div class="playerMenu">
                <div class="cartIcon">
                    <a href="/cart">
                        <span class="cartQt">{{Auth::user()->cartQt()}}</span>
                        <i class="fa-solid fa-cart-shopping fa-xl" style="color: #ffffff;"></i>
                    </a>
                </div>
                <div class="menu-avatar">
                    <image class="icon" src={{asset('storage/' . Auth::user()->avatar)}} title="User Avatar"/>
                </div>
                <div class="dropdown">
                    <div class="playerAlias">
                        <div>{{auth()->user()->alias}}</div>
                        <div></div>
                        <i class="fa-solid fa-angle-down fa-lg arrowIcon" style=""></i>
                    </div>
                    <div class="playerInfo">
                        <div class="playerLevel">{{auth()->user()->niveau}}&nbsp;</div>
                        <div class="playerFunds">
                            <img class="menuCoin" src="{{asset("/images/coin.png")}}" alt="coin"/>
                            <div>{{auth()->user()->solde}}</div>
                            <div></div>
                        </div>
                    </div>
                    <div class="dropdown-content">
                        <a href="/inventory" class="dropdownLink">
                            <i class="fa-solid fa-box"></i>
                            <p>Inventaire</p>
                        </a>
                        <a href="/profile" class="dropdownLink">
                            <i class="fa-solid fa-user"></i>
                            <p>Mon profil</p>
                        </a>
                        <a href="#" class="dropdownLink">
                            <i class="fa-solid fa-coins"></i>
                            <p>Faire une demande</p>
                        </a>
                        <a href="/logout" class="dropdownLink">
                            <i class='fa-solid fa-sign-out'></i>
                            <p>Déconnexion</p>
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="loginBtn">
                <i class='fa-solid fa-arrow-right-to-bracket'></i>
                <a href="/logout">Se connecter</a>
            </div>
            @endauth
        </ul>
    </div>
</nav>
