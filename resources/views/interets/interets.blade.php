<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/interets.css') }}">
    <title>@yield('title', 'Mes Intérêts')</title>
</head>

<body>
    <h1>Tes intérêts :</h1>

    @foreach ($categories as $categorie)
        <div class="categorie-div">
            <h2>{{ $categorie->nom }}</h2>

            @php
             $interetsPourCategorie = $interets->where('id_categorie', $categorie->id);
             $interetsUtilisateurPourCategorie = $interetsUtilisateur->intersect($interetsPourCategorie->pluck('id'));

            @endphp

            @if ($interetsUtilisateur->isEmpty())
                <p>Aucun intérêt dans la catégorie {{ $categorie->nom }}.</p>
            @else
                @foreach ($interetsUtilisateur as $interet)
                    <div class="tag">{{ $interet->nom }}</div> 
                @endforeach
            @endif
        </div>
    @endforeach

    <button class="buttonDetail btn btn-primary" id="openOverlay">Modifier vos intérêts</button>

    <div class="interet-overlay" id="overlay" style="display: none;">
        <div class="interet-modal">
            <h1>Modifier vos intérêts :</h1>
            <button class="close-button" onclick="window.location.href='{{ route('interets.interets', Auth::user()->id) }}'">&times;</button>

            <form action="{{ route('interets.update_Interets', Auth::user()->id) }}" method="POST" id="interetForm">
                @csrf 
                @method('PUT') 

                @if (!empty($categories)) 
                    @foreach ($categories as $categorie)
                        <div class="interet-categorie-div">
                            <h3>{{ $categorie->nom }}</h3> 
                            @foreach ($interets as $interet)
                                @if ($interet->id_categorie == $categorie->id) 
                                    <div class="interet-tag {{ in_array($interet->interet_id, $interetsUtilisateur->pluck('id')->toArray()) ? 'interet-selected' : '' }}" 
                                         data-id="{{ $interet->interet_id }}">
                                        {{ $interet->nom }} 
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <p>Aucune catégorie trouvée.</p>
                @endif

                <button type="submit" class="interet-btn-primary">Sauvegarder les changements</button>
            </form>
        </div>
    </div>

</body>
</html>
