<body>
@if(isset($message))
    <div class="alert alert-info">{{ $message }}</div>
@endif
    <link rel="stylesheet" href="{{ asset('css/meetupForm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meetupForm_julie.css') }}">
    <div class="meetups-container">
        
        @if ($user->id == Auth::user()->id)
            <h1>Mes Meetups</h1>
        @else
            <h1>Les Meetups de {{ $user->first_name }} </h1>  
        @endif

        @if($meetups->isEmpty())
            <p>Aucun meetup trouvé.</p>
        @else
            <div class="cards_list">
                @foreach($meetups as $meetup) 
                    <div class="card no_select hover_darker">
                        <div class="my banner meetup-card-header">
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
                        <div class="content">
                            <div class="header">
                                <div class="text_nowrap name_cntr">
                                  <span class="name">{{$meetup->name}}</span>
                                </div>
                                <span class="meetup-date">{{ \Carbon\Carbon::parse($meetup->date)->format('d M Y') }}</span>
                            </div>
                            <span class="meetup-creator">Organisé par {{ $meetup->owner->first_name }}</span>

                            <div class="adress">
                                <span class="material-symbols-rounded icon_sm">location_on</span>
                                <div class="text_nowrap">
                                    <span>{{$meetup->adress}}, {{$meetup->city}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="meetup-card-footer">
                            <div class="meetup-participants">
                                <span class="participant-count">{{ $meetup->nb_participant }} participants</span>
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
                                    <a  href="/meetup/{{ $meetup->id }}/meetupManager" class="btn_primary">
                                        Gérer les demandes
                                    </a>
                                </div>
                                <br>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>


