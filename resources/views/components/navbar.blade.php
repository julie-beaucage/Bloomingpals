@if (Auth::check())
    <nav id="navbar">
        <a class="title no_select" href="/home">BloomingPals
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
        </a>
        <a class="shrinked_title no_select shrinked_only" href="/home">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
        </a>
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
                    'id' => 'messages',
                    'title' => 'Messages',
                    'icon' => 'forum',
                    'url' => route('messages')
                ],
                [
                    'id' => 'pals',
                    'title' => 'Pals',
                    'icon' => 'group',
                    'url' => route('searchUsers')
                ],
                [
                    'id' => 'notification',
                    'title' => 'Notifications',
                    'icon' => 'notifications',
                    'url' => "#"
                ],
                [
                    'id' => 'feed',
                    'title' => "Fil d'actualité",
                    'icon' => 'explore',
                    'url' => route('feed')
                ],
                [
                    'id' => 'profile',
                    'title' => 'Profil',
                    'icon' => Auth::user()->image_profil ? asset('storage/' . Auth::user()->image_profil) : asset('/images/simple_flower.png'),
                    'url' => route('profile', ['id' => Auth::user()->id]),
                    'submenu' => [
                        [
                            'title' => 'Mon profil',
                            'url' => route('profile', ['id' => Auth::user()->id]),
                            'icon' => 'person',
                        ],
                        [
                            'title' => 'Déconnexion',
                            'url' => route('logout'),
                            'icon' => 'logout',
                        ],
                        [
                            'title' => 'A propos',
                            'url' => route('about'),
                            'icon' => 'info',
                        ]
                    ]
                ],
            ];
            if (Auth::user()->is_admin) {
                array_push($tabs, [
                    'id' => 'adminReports',
                    'title' => 'reports',
                    'icon' => 'report',
                    'url' => route('AdminReports')
                ]);
            }

            foreach ($tabs as $tab) {
                $id = $tab['id'];
                $title = $tab['title'];
                $titlesub = $tab['title'];
                $icon = $tab['icon'] ?? '';
                $url = $tab['url'];
                $urlsub = $tab['url'];
                $submenu = $tab['submenu'] ?? null;

                $class = 'navbar_item no_select';
                $class = $id == Route::current()->uri() ? $class . ' active' : $class;
                $class .= ' ' . Auth::user()->getPersonalityGroup();
                $hideNotification = '';
                if ($id == 'notification') {
                    $hideNotification = 'hideNotification';
                    $notif_count = App\Models\Notification::where('id_user', '=', Auth::user()->id)->where('status', '=', 'unread')->count();
                    if ($notif_count != 0) {
                        $unreadNotif = '<div class="notification-badge-container"><span class="notification-badge"><span class="notif-count">' . $notif_count . '</span></span></div>';
                    }
                } else {
                    $hideNotification = '';
                    $unreadNotif = '';
                }
                $notifId = '';
                if ($id == 'notification') {
                    $notifId = 'navbar_notification';
                }

                $hideLogout = '';
                if ($id == 'logout') {
                    $hideLogout = 'hideNotification';
                }
                if ($id === 'profile') {
                    echo '<div class="profile-menu-container">
                            <a class="' . $class . '" href="' . $url . '">
                                <div class="shrinked_title shrinked_only">
                                    <span class="title">' . $title . '</span>
                                </div>
                                <span class="navbar_icon">
                                    <img src="' . $icon . '" alt="Photo de profil" class="profile-image">
                                    <span class="title">' . $title . '</span>
                                </span>
                            </a>
                            <div class="profile-dropdown">';
                    foreach ($submenu as $sub) {
                        $iconSub = $sub['icon'] ? '<span class="material-symbols-rounded icon_md">' . $sub['icon'] . '</span>' : ''; 

                        echo '<a href="' . $sub['url'] . '">' . $iconSub . $sub['title'] . '</a>';                    }
                    echo '</div>
                        </div>';
                } elseif ($id == 'notification') {
                    echo '<a class="' . $class . '" href="' . $url . '">
                             ' . $unreadNotif . '
                            <div class="shrinked_title shrinked_only">
                               <span class="title">' . $title . '</span>
                            </div>
                            <span class="navbar_icon">
                              <span class="material-symbols-rounded icon_md">' . $icon . '</span>
                              <span class="title">' . $title . '</span>
                            </span>
                        </a>';
                } else {
                    echo '<a class="' . $class . '" href="' . $url . '">
                            <div class="shrinked_title shrinked_only">
                                <span class="title">' . $title . '</span>
                            </div>
                            <span class="navbar_icon">
                                <span class="material-symbols-rounded icon_md">' . $icon . '</span>
                                <span class="title">' . $title . '</span>
                            </span>
                        </a>';
                }
            }
        @endphp
    </nav>
@endif