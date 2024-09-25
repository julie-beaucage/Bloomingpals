{{-- @if (Auth::check()) --}}
<nav id="navbar">
    <span class="title no_select">BloomingPals</span>
    @php
        $tabs = [
            [
                'id' => 'home',
                'title' => 'Accueil',
                'icon' => 'home',
                'url' => url('home')
            ],
            [
                'id' => 'search',
                'title' => 'Recherche',
                'icon' => 'search',
                'url' => url('search')
            ],
            [
                'id' => 'profile',
                'title' => 'Profil',
                'icon' => 'account_circle',
                'url' => url('profile')
            ],
            [
                'id' => 'logout',
                'title' => 'Déconnexion',
                'icon' => 'logout',
                'url' => url('logout')
            ]
        ];

        foreach($tabs as $tab) {

            $id = $tab['id'];
            $title = $tab['title'];
            $icon = $tab['icon'];
            $url = $tab['url'];

            $class = 'navbar_item no_select hover_darker';
            $class = $id == Route::current()->uri() ? $class . ' active' : $class;

            echo <<< HTML
                <a class="$class" href="$url">
                    <span class="material-symbols-rounded icon_md">$icon</span>
                    <span class="title">$title</span>
                </a>
            HTML;
        }
    @endphp
</nav>

{{-- @endif --}}