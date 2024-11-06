@if (Auth::check())
    <nav id="navbar">
        <span class="title no_select">BloomingPals
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
        </span>
        <span class="shrinked_title no_select shrinked_only">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
        </span>
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
                    'id' => 'profile',
                    'title' => 'Profil',
                    'icon' => Auth::user()->image_profil ? asset('storage/' . Auth::user()->image_profil) : asset('/images/simple_flower.png'),
                    'url' => route('profile', ['id' => Auth::user()->id])
                ],
                [
                    'id' => 'logout',
                    'title' => 'Déconnexion',
                    'icon' => 'logout',
                    'url' => route('logout')
                ]
            ];

            foreach ($tabs as $tab) {
                $id = $tab['id'];
                $title = $tab['title'];
                $icon = $tab['icon'];
                $url = $tab['url'];

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

                if ($id === 'profile') {
                    echo <<<HTML
                                        <a class="$class" href="$url">
                                            <div class="shrinked_title shrinked_only">
                                                <span class="title">$title</span>
                                            </div>
                                            <span class="navbar_icon">
                                                <img src="$icon" alt="Photo de profil" class="profile-image">
                                                <span class="title">$title</span>
                                            </span>
                                        </a>
                                    HTML;
                } else {
                    echo <<<HTML
                                        <a class="$class $hideNotification $notifId" href="$url">
                                        $unreadNotif
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
            }
        @endphp
    </nav>
@endif