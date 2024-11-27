@php
    $index=0;
    setlocale(LC_ALL, 'fr_FR');
@endphp

<div class="container-meetups">
    @foreach ($meetups as $meetup)
    @if(!(Auth::user()->id != $meetup->id_organisateur and $meetup->public ==0 ))
        <div class="container-meetup" id="{{$meetup->id}}">
            <div>
                @if($meetup->image != null)
                <img class="image" src="{{$meetup->image}}">
                @else
                @php
                $default_images=rand(1,3);
                $image='\images\meetup_default'.$default_images.'.png'; 
                @endphp
                <img class="image" src="{{$image}}">
                @endif
            </div>
            <div class="meetup-header">
                {{$meetup->nom}}
            </div>
            
            <div class="flex-row">
                <img class="profile-picture" src="{{ $meetup->image_profil ? asset('storage/' . $meetup->image_profil) : asset('/images/simple_flower.png') }}"  id="{{$meetup->owner_id}}">
                <div sty>
                    <div class="text">{{$meetup->first_name}} {{$meetup->last_name}}</div>
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
        @endif
        @php
        $index+=1;
        @endphp
    @endforeach
</div>