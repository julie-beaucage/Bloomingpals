<div class="meetup-card">
    <div class="banner meetup-card-header">
            <img src="{{ $meetup->image }}" alt="Image de l'évènement">
    </div>
    <form id="deleteMeetupForm-{{ $meetup->id }}" action="{{ route('meetup.delete', ['id' => $meetup->id]) }}" method="POST" style="display: inline;">
    @csrf
    @method('POST')

    <a href="#" onclick="return confirmDelete('{{ $meetup->name }}', '{{ $meetup->id }}')">
        <div class="buttonn btn_accept no_select">Supprimer</div>
    </a>
</form>

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

