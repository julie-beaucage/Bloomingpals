@extends('master')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/meetupForm.css') }}">
    <link rel="stylesheet" href="{{ asset('css/palCard.css') }}">

@endsection()

@section('content')
    @php
        $user = Auth::user();
        $currentParticipants = $meetup->participants()->count();
        $maxParticipants = $meetup->nb_participant;
        $placesLeft = $maxParticipants - $currentParticipants;
    @endphp
    <div class="background_cntr no_select">     
        <img id="background_img" src="{{ $meetup['image'] }}" alt="Bannière de l'événement" crossorigin="anonymous">
    </div>

    <div id="event_cntr">
        <div class="banner">
            <img id="banner_img" src="{{ $meetup['image'] }}" alt="Bannière de l'événement" crossorigin="anonymous">
        </div>
        <div class="container_event">
            <div class="section">
            <button 
            onclick="window.location.href='{{ route('profile', ['id' => $user->id]) }}?tab=meetups/meetups'" 
            class="btn_back">
            <span class="material-symbols-rounded">arrow_back</span>
            Retour 
       </button>   
        <div id="event_header">
            <h1 class="event_name">Gérer mon évènement:  {{ $meetup->name }}</h1>
        </div>
        <h3>Organisé par {{ $meetup->owner->first_name }} {{ $meetup->owner->last_name }}</h3>
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
        <h2>Gérer les demandes: </h2>
        @if($pendingRequests->isEmpty())
            <p style="color: gray;">Aucune demande</p>
        @else
            @foreach($pendingRequests as $request)
                @php
                    $image = $request->image_profil ? asset('storage/' . $user->image_profil) : asset('/images/simple_flower.png');
                @endphp
                <div class="request_user_container">
                    <div class="banner ">
                    <img src="{{ asset('storage/' . $request->user_request->image_profil) }}"  alt="Image de profile de {{ $request->user_request->first_name }} {{ $request->user_request->last_name }}">
                    </div>
                    <div class="info_name">
                        <p>{{ $request->user_request->first_name }} {{ $request->user_request->last_name }}</p>
                    </div>
                    <div class="btn_container_request">
                        <form action="{{ route('meetups.accept_request', ['meetupId' => $meetup->id, 'userId' => $request->user_request->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Accepter</button>
                        </form>
                        <form action="{{ route('meetups.refuse_request', ['meetupId' => $meetup->id, 'userId' => $request->user_request->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Refuser</button>
                        </form>
                    </div> 
                </div>
            @endforeach
        @endif
        <hr>
        <h3>Participants acceptés:</h3>
        <div class="accepted_participants">
            @if($meetup->participants->isEmpty())
                <p style="color: gray;">Aucun participant</p>
            @else
                @foreach($meetup->participants as $participant)
                    @php
                      $actionButtons = '<button class="btn_refuse btn_primary">Retirer </button>';                    
                    @endphp
                    @include('partial_views.user_card', ['user' => $participant, 'actionButtons' => $actionButtons])

                    {{--!<div class="request_user_container">
                        <div class="banner">
                            <img src="{{ asset('storage/' . $participant->image_profil) }}" alt="Image de profil de {{ $participant->first_name }} {{ $participant->last_name }}">
                        </div>
                        <div class="info_name">
                            <p>{{ $participant->first_name }} {{ $participant->last_name }}</p>
                        </div>
                    </div>--}}
                @endforeach
            @endif
                </div>
           </div>
        </div>
    </div>
@endsection()

@section('script')
 <script src="{{ asset('/js/layout.js') }}"></script>
@endsection()


