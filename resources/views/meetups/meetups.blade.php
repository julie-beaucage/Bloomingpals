@extends("master")

@section('style')
<link rel="stylesheet" href="{{ asset('css/meetup.css') }}">
@endsection
@php
$index=0;
setlocale(LC_ALL, 'fr_FR');
@endphp

@section("content")

<div class="container-meetups">

    @foreach ($meetups as $meetup)
        <div class="container-meetup" id="{{$meetup->id}}">
            <div>
                @if($meetup->image != null)
                <img class="image" src="{{$meetup->image}}">
                @else
                @php
                $image= $default_images[rand(0,(count($default_images)-1))];
                @endphp
                <img class="image" src="{{$image}}">
                @endif
            </div>
            <div class="meetup-header">
                {{$meetup->nom}}
            </div>
            
            <div class="flex-row">
                <img class="profile-picture" src="storage\images\flower.png" id="{{$users[$index]->id}}">
                <div sty>
                    <div class="text">{{$users[$index]->prenom}} {{$users[$index]->nom}}</div>
                    <div>Affinité: 50%</div>
                </div>
            </div>
            <div class="flex-row" style="flex-direction:column; margin-bottom:1em;">
                <div class="flex-row" style="justify-content:space-between; width:100%;">
                   <div class="text">Date :</div>
                   
                   <div class="text">Ville :   </div>

                </div>
                <div class="flex-row" style="justify-content:space-between; width:100%;">
                    <div>{{date("Y-m-d",strtotime($meetup->date));}}</div>
                    <div style>{{$meetup->ville}}   </div>

                </div>
            </div>
            

        </div>
        @php
        $index+=1;
        @endphp
    @endforeach


</div>

@endsection
@section("script")
<script>
    $(".profile-picture").on('click',function(){
       window.location.href="#"+this.id;
    });

    $(".container-meetup").on('click',function(event){
        if(event.target.className != 'profile-picture'){
            window.location.href="meetupForm/"+ this.id;
        }
    });

</script>
@endsection