<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/interets.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Mes Intérêts</title>
</head>

<body>
    <button class="buttonDetail btn btn-primary" id="openOverlay">
    <i class="fas fa-pencil-alt" style="color: black;"></i>
</button>
    @foreach ($categories as $categorie)
        <div class="categorie-div">
            <h4>{{ $categorie->nom }}</h4>
            @php
                $interetsPourCategorie = [];
            @endphp

            @foreach ($interetsUtilisateur as $interetUtilisateur)
                @if ($interetUtilisateur->id == $categorie->id)
                    @php
                        $interetsPourCategorie[] = $interetUtilisateur; 
                    @endphp @endif
            @endforeach

            @if (empty($interetsPourCategorie))
                <p>Aucun intérêt dans la catégorie {{ $categorie->nom }}.</p>
            @else
                @foreach ($interetsPourCategorie as $interetUtilisateur)
                    <div class="tag">{{ $interetUtilisateur->nom }}</div>
                @endforeach
            @endif
        </div>
    @endforeach

    <div class="interet-overlay" id="overlay" style="display: none;">
        <div class="interet-modal">
            <h3 class="titreModalInteret">Modifier vos intérêts :</h3>
            <button class="close-button"
                onclick="window.location.href='{{ route('profile', Auth::user()->id) }}'">&times;</button>
            <form action="{{ route('interets.update_Interets', Auth::user()->id) }}" method="POST" id="interetForm">
                @csrf
                @method('PUT')

                @if (!empty($categories))
                    @foreach ($categories as $categorie)
                        <div class="interet-categorie-div">
                            <h3>{{ $categorie->nom }}</h3>
                            @foreach ($interets as $interet)
                                @if ($interet->id_categorie == $categorie->id)
                                <div class="interet-tag {{ in_array($interet->id, $interetsUtilisateurTab) ? 'interet-selected' : '' }}" 
                                data-id="{{ $interet->id }}">
                                        {{ $interet->nom }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <p>Aucune catégorie trouvée.</p>
                @endif
                <input type="hidden" name="interets" id="interetSelectedInterets" value="{{ implode(',', $interetsUtilisateurTab) }}"> 

                <button type="submit" class="interet-btn-primary">Sauvegarder les changements</button>
            </form>
        </div>
    </div>
</body>

</html>