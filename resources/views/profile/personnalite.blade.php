@if (is_null($personality))
    <p>Découvrez votre personnalité et facilitez la recherche d'affinité pour vous faire de nouveaux amis.</p>
    <a href="{{ route('personality.test') }}" class="btn btn-primary">
        Faire le Test
    </a>
@else
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
        </div>
    </div>
@endif

