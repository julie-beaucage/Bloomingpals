
<x-email-verification-modal />


@if (is_null($personality))

    <p>Découvrez votre personnalité et facilitez la recherche d'affinité pour vous faire de nouveaux amis.</p>

    <button class="btn btn-primary" onclick="handlePersonalityTestClick(event)">
        Faire le Tests
    </button>
@else
    @if ($user->id == Auth::user()->id)
        <div class="containerPerso">
            <h2 class="test">Votre Personnalité</h2>
            <div class="personality-card {{ strtolower($personality->group_name) }}">
                <p>Nom : <strong>{{ $personality->group_name }}</strong></p>
                <p>Nom : <strong>{{ $personality->name }}</strong></p>
                <p>Type : <strong>{{ $personality->type }}</strong></p>
                <p>Description : {{ $personality->nameDescription }}</p>
                <a href="{{ route('personality.test') }}" class="btn btn-primary">
                    Refaire le Test
                </a>
                <x-email-verification-modal />
                <button class="btn btn-primary" onclick="handlePersonalityTestClick()">
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
@section('script')



