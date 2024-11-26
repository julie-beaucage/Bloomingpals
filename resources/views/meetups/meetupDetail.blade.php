@extends('master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meetupForm_julie.css') }}">
@endsection()

@section('content')
    @php
        use App\Helpers\MeetupHelper;
        use App\Models\Meetup_Interest;
        use App\Models\Interest;

        $user = Auth::user();
        $currentParticipants = $meetup->participants()->count();
        $maxParticipants = $meetup->nb_participant;
        $placesLeft = $maxParticipants - $currentParticipants;

        $btn = btn_setUp($user->id, $meetup);

        $tags = "";
        $meetup_interests = Meetup_Interest::where('id_meetup', $meetup->id)->get();
        foreach ($meetup_interests as $meetup_interest) {
            $interest = Interest::find($meetup_interest->id_interest);
            if ($interest == null) continue;

            $tags .= '<span class="tag" style="background-color: var(--category-'. $interest->id_category .')">' . $interest->name . '</span>';
        }
        $meetImg= asset('images\meetup_default'.rand(1,3).'.png');

    @endphp

    <div class="background_cntr no_select">
        <div id="background_color"></div>
        <img id="background_img" src="{{ $meetup['image'] ? "/".$meetup->image :$meetImg }}" crossorigin="anonymous">
    </div>
    <div id="event_cntr">
        <div class="banner">
            <img id="banner_img" src="{{ $meetup['image'] ? "/".$meetup->image : $meetImg }}" crossorigin="anonymous">
        </div>
        <div class="container_event">
            <div class="section">
                <div id="event_header">
                    <h1 class="event_name">{{ $meetup->name }}</h1>
                    <div class="tags">
                        @php echo $tags @endphp
                    </div>
                </div>
                {!! $btn !!}
            </div>
            <div class="section">
                <h2 class="title">Organisateur</h2>
                <a class="owner_cntr" href="/profile/{{$meetup->owner->id}}">
                    <div class="banner_owner {{ $meetup->owner->getPersonalityGroup(); }}">
                        <img src="{{ $meetup->owner->image_profil ? asset('storage/' . $meetup->owner->image_profil) : asset('/images/simple_flower.png'); }}">
                    </div>
                    <div class="content">
                        <span class="name">{{ $meetup->owner->full_name }}</span>
                        @if ($user->id != $meetup->owner->id)
                            <span>{{ $user->calculateAffinity($meetup->owner->id, $user->id); }}% d'affinité avec vous</span>
                        @endif()
                    </div>
                </a>
            </div>
            
            <div class="section">
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
                        </span>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="header_linked">
                    <h2 class="title">Participants <span class="text_light">({{ count($meetup->participants) }})</span></h2>
                    @if ($user->id == $meetup->owner->id)
                        <a class="link_grey" href="/meetup/{{$meetup->id}}/meetupManager">Voir les demandes</a>
                    @endif()
                </div>
                <div>
                    @if (count($meetup->participants) == 0)
                        <span>Aucun participant pour le moment</span>
                    @else
                        @foreach ($meetup->participants as $participant)
                            <a class="owner_cntr" href="/profile/{{$participant->id}}">
                                <div class="banner_owner {{ $participant->getPersonalityGroup(); }}">
                                    <img src="{{ $participant->image_profil ? asset('storage/' . $participant->image_profil) : asset('/images/simple_flower.png'); }}">
                                </div>
                                <div class="content">
                                    <span class="name">{{ $participant->full_name }}</span>
                                    <span>{{ $user->calculateAffinity($participant->id, $user->id); }}% d'affinité avec vous</span>
                                </div>
                            </a>
                        @endforeach
                    @endif
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
