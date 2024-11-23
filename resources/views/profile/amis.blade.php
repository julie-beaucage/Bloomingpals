@php
use App\Models\User_Interest; 
use App\Models\Interest;
use App\Models\Category_Interest;
use Illuminate\Support\Facades\Auth;
@endphp

<div class="myPalContainer">
    <input type="text" class="searchBarre" id="searchFriends" placeholder="Rechercher un pal...">
    @if ($user->id == Auth::user()->id)
        <h5>Mes demandes d'amitiés</h5> 
        @if (count($pendingUsers) == 0)
         <p>Aucune demandes d'amitiés  </p>
        @endif 
        @foreach ($pendingUsers as $pending)
            @php
                $actionButtons = '<button class="btn_primary btn_accept ">Accepter</button><button class="btn_primary btn_refuse">Refuser</button>';
            @endphp
            @include('partial_views.user_card', ['user' => $pending, 'actionButtons' => $actionButtons])
        @endforeach
        <hr>  
    @endif
    @if ($user->id == Auth::user()->id)
      <h5>Mes pals</h5> 
    @else    
      <h5>Les pals de {{$user->first_name}} </h5> 
    @endif
    @if (count($users) == 0)
      <p>Aucun pals actuellement </p>
    @endif
    @foreach ($users as $user)
        @php
            $actionButtons = '<button class="btn_refuse btn_primary">Retirer de mes amis</button>';
        @endphp
        @include('partial_views.user_card', ['user' => $user, 'actionButtons' => $actionButtons])
    @endforeach
