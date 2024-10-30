<x-email-verification-modal />
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

@if (is_null($personality))

<div class="personality-container-empty">
    <p class="personality-message">Découvrez votre personnalité et facilitez la recherche d'affinités pour vous faire de nouveaux amis !</p>
    <p class="personality-instruction">Complétez le test de personnalité basé sur Myers-Briggs pour trouver des "Pals" similaires à vous !</p>
    <button class="personality-button-start" onclick="handlePersonalityTestClick(event)">
        Faire le Test de Personnalité
    </button>
</div>

@else
    @if ($user->id == Auth::user()->id)
        <div class="containerPerso">
            <h2 class="test">Votre Personnalité</h2>
            <div class="personality-card {{ strtolower($personality->group_name) }}">
                <p>Nom : <strong>{{ $personality->group_name }}</strong></p>
                <p>Nom : <strong>{{ $personality->name }}</strong></p>
                <p>Type : <strong>{{ $personality->type }}</strong></p>
                <p>Description : {{ $personality->nameDescription }}</p>
                <x-email-verification-modal />
                <button class="buttonGlass" onclick="handlePersonalityTestClick()">
                    Faire le Test
                </button>
            </div>
        </div>
    @else
        <p>Ce profil appartient à <strong>{{ $user->name }}</strong>, qui est un type de :</p>
        <div class="personality-card {{ strtolower($personality->group_name) }}">
            <p>Nom : <strong>{{ $personality->group_name }}</strong></p>
            <p>Nom : <strong>{{ $personality->name }}</strong></p>
            <p>Type : <strong>{{ $personality->type }}</strong></p>
            <p>Description : {{ $personality->nameDescription }}</p>
        </div>
    @endif
@endif