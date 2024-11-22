<body>
    <link rel="stylesheet" href="{{ asset('css/meetupForm.css') }}">
    <div class="meetups-container">
        
        @if ($user->id == Auth::user()->id)
            <h1>Mes Meetups</h1>
        @else
            <h1>Les Meetups de {{ $user->first_name }} </h1>  
        @endif

        @if($meetups->isEmpty())
            <p>Aucun meetup trouvé.</p>
        @else
            <div class="meetups-list">
                @foreach($meetups as $meetup) 
                <div class="meetup-card">
                        <div class="banner meetup-card-header">
                            <img src="{{ $meetup->image }}" alt="Image de l'évènement">
                        </div>
                        @if ($meetup->user_id == Auth::user()->id)
                            <form id="deleteMeetupForm-{{ $meetup->id }}" action="{{ route('meetup.delete', ['id' => $meetup->id]) }}" method="POST" style="display: inline;">
                                @csrf
                                <a href="#" onclick="return confirmDelete('{{ $meetup->name }}', '{{ $meetup->id }}')">
                                    <div class="buttonn btn_accept no_select">Supprimer</div>
                                </a>
                            </form>
                        @endif
                        <div class="meetup-card-body">
                            <div class="meetup-info">
                                <h3>{{ $meetup->name }}</h3>
                                <span class="meetup-date">{{ \Carbon\Carbon::parse($meetup->date)->format('d M Y') }}</span>
                                <span class="meetup-creator">Organisé par {{ $meetup->owner->first_name }}</span>
                                <span class="meetup-address">{{ $meetup->address }}</span>
                            </div>
                                <p>{{ Str::limit($meetup->description, 150) }}</p>
                        </div>
                        <div class="meetup-card-footer">
                            <div class="meetup-participants">
                                <span class="participant-count">{{ $meetup->nb_participant }} participants</span>
                                <div class="participants-list">
                                    <ul>
                                        @foreach($meetup->participants as $participant)
                                            <li>
                                                <img src="{{ $participant->image }}" alt="{{ $participant->first_name }}'s profile picture" class="participant-avatar">
                                                <span>{{ $participant->first_name }} {{ $participant->last_name }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @if(auth()->id() == $meetup->owner->id)
                                @php
                                    $pendingRequestsCount = $meetup->requests()->where('status', 'pending')->count();
                                @endphp
                                <div class="pending-requests">
                                    <span class="requests-count {{ $pendingRequestsCount > 0 ? 'red' : '' }}">
                                        {{ $pendingRequestsCount }} demande(s) en attente
                                    </span>
                                </div>
                                <div class="manage-requests-button">
                                    <a href="{{ route('meetup.manage', $meetup->id) }}" class="btn btn-manage-requests">
                                        Gérer les demandes
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>


