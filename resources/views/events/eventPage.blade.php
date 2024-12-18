@extends('master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
@endsection()

@php
    use App\Models\Event_Category;
    use App\Models\Event_Interest;
    use App\Models\Interest;
    use App\Models\Category_Interest;

    $tags = "";
    $attendees = [];

    $event_category = Event_Category::where('id_event', $event->id)->get();
    foreach ($event_category as $event_category) {
        $category = Category_Interest::find($event_category->id_category);
        if ($category == null) continue;

        $tags .= '<span class="tag" style="background-color: var(--category-'. $category->id .')">' . $category->name . '</span>';
    }

    $event_interests = Event_Interest::where('id_event', $event->id)->get();
    foreach ($event_interests as $event_interest) {
        $interest = Interest::find($event_interest->id_interest);
        if ($interest == null) continue;

        $tags .= '<span class="tag" style="background-color: var(--category-'. $interest->id_category .')">' . $interest->name . '</span>';
    }
@endphp

@section('content')
    <div class="background_cntr no_select">
        <div id="background_color"></div>
        <img id="background_img" src="{{ $event['image'] }}" alt="Bannière de l'événement" crossorigin="anonymous">
    </div>

    <div id="event_cntr">
        <div class="banner">
            <img id="banner_img" src="{{ $event['image'] }}" alt="Bannière de l'événement" crossorigin="anonymous">
        </div>

        <div class="container">
            <div class="section">
                <div id="event_header">
                    <h1 class="event_name">{{ $event['name'] }}</h1>
                    <div class="tags">
                        @php echo $tags @endphp
                    </div>
                </div>
                <a class="btn_primary no_select">Rejoindre</a>
            </div>

            <div class="section">
                <h2 class="title">Informations</h2>
                <div class="showcase">
                    <div>
                        <b>Date</b>
                        <span class="text_center no_wrap">{{ date('j-m-Y', strtotime($event['date'])) }}</span>
                    </div>

                    <div>
                        <b>Heure</b>
                        <span class="text_center no_wrap">{{ date('H:i', strtotime($event['date'])) }}</span>
                    </div>

                    <div>
                        <b>Lieu</b>
                        <span class="text_center">
                            {{ $event["adress"] }}
                        </span>
                        <span class="text_center">
                            {{ $event["city"] }}
                        </span>
                    </div>

                    <div>
                        <b>Prix</b>
                        <span class="text_center">{{ $event['price'] }}</span>
                    </div>
                </div>
            </div>

            @if ($event['description'] != '' && $event['description'] != null)
                <div class="section">
                    <h2 class="title">Description</h2>
                    <p>{{ $event['description'] }}</p>
                </div>
            @endif

            <div class="section">
                <h2 class="title">Participants <span class="text_light">({{ count($attendees) }})</span></h2>
                <div>
                    @if (count($attendees) == 0)
                        <span>Aucun participant pour le moment</span>
                    @else
                        @foreach ($attendees as $attendee)
                            <div>
                                <img src="{{ $attendee['photo'] }}" alt="Photo de profil de {{ $attendee['name'] }}">
                                <span>{{ $attendee['name'] }}</span>
                            </div>
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
            // Set the background color of the body
            // to the average color of the banner image
            var img = document.getElementById("background_img");
            var color = document.getElementById("background_color");
            document.body.style.background = 'rgb(0,0,0)';

            // get average color and set
            var rgb = getAverageRGB(img);
            color.style.background = 'rgb(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ')';
        });

        function getAverageRGB(img) {
            var blockSize = 5, // only visit every 5 pixels
            defaultRGB = {
                r: 0,
                g: 0,
                b: 0
            }, // for non-supporting envs
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
