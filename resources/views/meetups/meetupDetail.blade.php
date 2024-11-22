@extends('master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meetupForm.css') }}">
@endsection()

@section('content')
    @php
        $user = Auth::user();
        $currentParticipants = $meetup->participants()->count();
        $maxParticipants = $meetup->nb_participant;
        $placesLeft = $maxParticipants - $currentParticipants;
    @endphp
    <div class="background_cntr no_select">
        <button onclick="window.location.href='{{ route('profile', ['id' => $user->id]) }}?tab=meetups/meetups'" class="btn btn-primary">
          Retour à Rencontres
        </button>
        <div id="background_color"></div>
        <img id="background_img" src="{{ $meetup['image'] }}" alt="Bannière de l'événement" crossorigin="anonymous">
    </div>
    <div id="event_cntr">
        <div class="banner">
            <img id="banner_img" src="{{ $meetup['image'] }}" alt="Bannière de l'événement" crossorigin="anonymous">
        </div>
        <div class="container_event">
            <div class="section">
                <div id="event_header">
                    <h1 class="event_name">{{ $meetup->name }}</h1>
                </div>
                <h3>Organisé par {{ $meetup->owner->first_name }} {{ $meetup->owner->last_name }}</h3>
            </div>
            <div class="section">
            <div class="meetup-btn">
    {!! btn_setUp(auth()->id(), $meetup) !!}
</div>

                <h2 class="title">Informations</h2>
                <div class="showcase">
                    <div>
                        <b>Date</b>
                        <span class="text_center no_wrap">{{ date('j-m-Y', strtotime($meetup['date'])) }}</span>
                    </div>
                    <div>
                        <b>Heure</b>
                        <span class="text_center no_wrap">{{ date('H:i', strtotime($meetup['date'])) }}</span>
                    </div>
                    <div>
                        <b>Lieu</b>
                        <span class="text_center">
                            {{ $meetup["adress"] }}
                        </span>
                        <span class="text_center">
                            {{ $meetup["city"] }}
                        </span>4
                    </div>
                    <div>
                        <b>Participant(s)</b>
                        <span class="text_center no_wrap">
                        {{ $currentParticipants }}/{{ $maxParticipants }}
                    </span>
                    </div>
                </div>
            </div>
            <div class="request-list">
                <h3>Participant(s):</h3>
                <div class="accepted_participants">
                @forelse($meetup->participants as $participant)
                    <div class="request_user_container card_long no_select hover_darker" onclick="window.location.href = '{{ route('profile', ['id' => $participant->id]) }}';">
                        <div class="banner {{ $participant->userPersonality }}">
                            <img src="{{ asset('storage/' . $participant->image_profil) }}" alt="Image de profil de {{ $participant->first_name }} {{ $participant->last_name }}">
                        </div>
                        <div class="info_name">
                            <p>{{ $participant->first_name }} {{ $participant->last_name }}</p>
                        </div>
                    </div>
                @empty
                    <p>Aucun participant</p>
                @endforelse
                </div>
           </div>
        </div>
    </div>
@endsection()

@section('script')
    <script>
        $(document).ready(function() {
            var img = document.getElementById("background_img");
            var color = document.getElementById("background_color");
            document.body.style.background = 'rgb(0,0,0)';
            var rgb = getAverageRGB(img);
            color.style.background = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
        });

        function getAverageRGB(img) {
            var blockSize = 5,
            defaultRGB = {
                r: 0,
                g: 0,
                b: 0
            }, 
            canvas = document.createElement('canvas'),
            context = canvas.getContext && canvas.getContext('2d'),
            data, width, height,
            i = -4,
            length,
            rgb = {
                r: 0,
                g: 0,
                b: 0
            },
            count = 0;

            height = canvas.height = img.naturalHeight || img.offsetHeight || img.height;
            width = canvas.width = img.naturalWidth || img.offsetWidth || img.width;

            context.drawImage(img, 0, 0);

            try {
                data = context.getImageData(0, height-5, width, 1);
            } catch (e) {
                return defaultRGB;
            }

            length = data.data.length;

            while ( (i += blockSize * 4) < length ) {
                ++count;
                rgb.r += Math.pow(data.data[i], 2.2);
                rgb.g += Math.pow(data.data[i+1], 2.2);
                rgb.b += Math.pow(data.data[i+2], 2.2);
            }

            // ~~ used to floor values
            rgb.r = ~~Math.pow(rgb.r/count, 1/2.2);
            rgb.g = ~~Math.pow(rgb.g/count, 1/2.2);
            rgb.b = ~~Math.pow(rgb.b/count, 1/2.2);
            
            return rgb;
        }
    </script>
@endsection()
