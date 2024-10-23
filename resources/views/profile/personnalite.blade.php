
@if (is_null($personality))
    <p>Découvrez votre personnalité et facilitez la recherche d'affinité pour vous faire de nouveaux amis.</p>
    <a href="{{ route('personality.test') }}" class="btn btn-primary">
        Faire le Test
    </a>
@else
    <h2>Votre Personnalité</h2>
    <p>Nom : <strong>{{ $personality->name }}</strong></p>
    <p>Type : <strong>{{ $personality->type }}</strong></p>
    <p>Description : {{ $personality->nameDescription }}</p>
    <a href="{{ route('personality.test') }}" class="btn btn-primary">
        Refaire le Test
    </a>
@endif
