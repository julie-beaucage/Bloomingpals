<body>
<link rel="stylesheet" href="{{ asset('css/meetupForm.css') }}">
<div class="meetups-container">
    <h1>Mes Meetups</h1>

    @if($meetups->isEmpty())
        <p>Aucun meetup trouvé.</p>
    @else
        <div class="meetups-list">
            @foreach($meetups as $meetup)
              <x-meetupCard :meetup="$meetup" />
            @endforeach
        </div>
    @endif
</div>
</body>
