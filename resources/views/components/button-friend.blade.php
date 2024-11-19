@props(['user', 'relation'])
@if ($relation == "Friend")
    <a href="{{ route('RemoveFriend', ['id' => $user->id]) }}">
        <button class="friend-action-btn friend">Ami(e)</button>
    </a>
@elseif ($relation == "Blocked")
    <button class="friend-action-btn blocked" disabled>Bloqué</button>
@elseif ($relation == "SendingInvitation")
    <a href="{{ route('CancelFriendRequest', ['id' => $user->id]) }}">
        <button class="friend-action-btn pending">Demande envoyée</button>
    </a>
@elseif ($relation == "Invited")
    <div class="action-container">
        <a href="{{ route('AcceptFriendRequest', ['id' => $user->id]) }}">
            <button class="friend-action-btn accept">Accepter</button>
        </a>
        <a href="{{ route('RefuseFriendRequest', ['id' => $user->id]) }}">
            <button class="friend-action-btn decline">Refuser</button>
        </a>
    </div>
@else
    <a href="{{ route('SendFriendRequest', ['id' => $user->id]) }}">
        <button class="friend-action-btn add">Ajouter comme ami(e)</button>
    </a>
@endif
