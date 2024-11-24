@extends('master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meetupForm_julie.css') }}">
@endsection()

@section('content')
@php
 $user = Auth::user();
 $currentParticipants = $meetup->participants()->count();
 $maxParticipants = $meetup->nb_participant;
 $placesLeft = $maxParticipants - $currentParticipants;
@endphp
    <div class="background_cntr no_select">     
        <img id="background_img" src="{{ $meetup['image'] ? "/".$meetup->image : asset('/images/R.jpg') }}" alt="Bannière de l'événement" crossorigin="anonymous">
    </div>

    <div id="event_cntr">
        <div class="banner">
            <img id="banner_img" src="{{ $meetup['image'] ? "/".$meetup->image : asset('/images/R.jpg') }}" alt="Bannière de l'événement" crossorigin="anonymous">
        </div>
        <div class="container_event">
            <div class="section">
                <div id="event_header">
                    <h1 class="event_name">Gérer mon évènement:  {{ $meetup->name }}</h1>
                </div>
            </div>

            <div class="request-list">
                <h2>Gérer les demandes: </h2>
                @if($pendingRequests->isEmpty())
                  <p style="color: gray;">Aucune demande</p>
                @else
                    @foreach($pendingRequests as $request)
                        @php
                            $image = $request->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
                        @endphp
                        <a class="owner_cntr" href="/profile/{{$request->user_request->id}}">
                            <div class="cntr_row_btn">
                                <div class="banner_owner {{ $request->user_request->getPersonalityGroup(); }}">
                                    <img src="{{ $request->user_request->image_profil ? asset('storage/' . $request->user_request->image_profil) : asset('/images/simple_flower.png'); }}">
                                </div>
                                <div class="content">
                                    <span class="name">{{ $request->user_request->full_name }}</span>
                                    <span>{{ $user->calculateAffinity($request->user_request->id, $user->id); }}% d'affinité avec vous</span>
                                </div>
                            </div>
                            <div class="btn_container_request">
                                <form action="{{ route('meetups.accept_request', ['meetupId' => $meetup->id, 'userId' => $request->user_request->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn_c btn_primary">Accepter</button>
                                </form>
                                <form action="{{ route('meetups.refuse_request', ['meetupId' => $meetup->id, 'userId' => $request->user_request->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn_c btn_primary">Refuser</button>
                                </form>
                            </div>
                        </a>
                    @endforeach
                @endif
                <hr>
                <h3>Participants acceptés:</h3>
                <div class="accepted_participants">
                    @if($meetup->participants->isEmpty())
                       <p style="color: gray;">Aucun participant</p>
                    @else
                        @foreach($meetup->participants as $participant)
                            <a class="owner_cntr" href="/profile/{{$participant->id}}">
                                <div class="cntr_row_btn">
                                    <div class="banner_owner {{ $participant->getPersonalityGroup(); }}">
                                        <img src="{{ $participant->image_profil ? asset('storage/' . $participant->image_profil) : asset('/images/simple_flower.png'); }}">
                                    </div>
                                    <div class="content">
                                        <span class="name">{{ $participant->full_name }}</span>
                                        <span>{{ $user->calculateAffinity($participant->id, $user->id); }}% d'affinité avec vous</span>
                                    </div>
                                </div>
                                <div class="btn_container_request">
                                    <form action="{{ route('meetups.remove_request', ['meetupId' => $meetup->id, 'userId' => $participant->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn_c btn_primary">Retirer</button>
                                    </form>
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
