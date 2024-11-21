<div class="meetup-card">
    <div class="meetup-card-header" style="background-image: url('{{ $meetup->image }}'); background-size: cover; background-position: center;">
        <div class="meetup-info">
            <h3>{{ $meetup->name }}</h3>
            <span class="meetup-date">{{ \Carbon\Carbon::parse($meetup->date)->format('d M Y') }}</span>
            <span class="meetup-creator">Organisé par {{ $meetup->owner->first_name }}</span>
            <span class="meetup-address">{{ $meetup->address }}</span>
        </div>
    </div>
    
    <div class="meetup-card-body">
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
                <span class="requests-count">{{ $pendingRequestsCount }} demande(s) en attente</span>
            </div>
            <div class="manage-requests-button">
                <a href="{{ route('meetup.manage', $meetup->id) }}" class="btn btn-manage-requests">
                    Gérer les demandes
                </a>
            </div>
        @endif
    </div>
</div>