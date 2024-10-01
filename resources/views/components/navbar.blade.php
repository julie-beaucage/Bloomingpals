@if (Auth::check())
    <nav id="navbar">
        <span class="title no_select">BloomingPals</span>
        <span class="shrinked_title no_select shrinked_only">BP</span>
        @php
            $tabs = [
                [
                    'id' => 'home',
                    'title' => 'Accueil',
                    'icon' => 'home',
                    'url' => route('home')
                ],
                [
                    'id' => 'search',
                    'title' => 'Recherche',
                    'icon' => 'search',
                    'url' => route('search')
                ],
                [
                    'id' => 'profile',
                    'title' => 'Profile',
                    'icon' => 'account_circle',
                    'url' => route('profile', Auth::user()->id)
                ],
                [
                    'id' => 'logout',
                    'title' => 'Déconnexion',
                    'icon' => 'logout',
                    'url' => route('logout')
                ]
            ];

            foreach($tabs as $tab) {

                $id = $tab['id'];
                $title = $tab['title'];
                $icon = $tab['icon'];
                $url = $tab['url'];

                $class = 'navbar_item no_select';
                $class = $id == Route::current()->uri() ? $class . ' active' : $class;

                echo <<< HTML
                    <a class="$class" href="$url">
                        <div class="shrinked_title shrinked_only">
                            <span class="title">$title</span>
                        </div>
                        <span class="navbar_icon">
                            <span class="material-symbols-rounded icon_md">$icon</span>
                            <span class="title">$title</span>
                        </span>
                    </a>
                HTML;
            }

            echo <<< HTML
                <svg style="visibility: hidden; position: absolute;" width="0" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1">
                    <defs>
                        <filter id="goo"><feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />    
                            <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                            <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                        </filter>
                    </defs>
                </svg>
            HTML;
        @endphp
    </nav>
@endif
