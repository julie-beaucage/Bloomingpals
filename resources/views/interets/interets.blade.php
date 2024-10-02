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
            <h4>{{ $categorie->nomCategorie }}</h4>
            @php
                $interetsPourCategorie = [];
            @endphp

            @foreach ($interetsUtilisateur as $interetUtilisateur)
                @if ($interetUtilisateur->idCategorie == $categorie->idCategorie)
                    @php
                        $interetsPourCategorie[] = $interetUtilisateur; 
                    @endphp @endif
            @endforeach

            @if (empty($interetsPourCategorie))
                <p>Aucun intérêt dans cette catégorie {{ $categorie->nomCategorie }}.</p>
            @else
                @foreach ($interetsPourCategorie as $interetUtilisateur)
                    <div class="tag">{{ $interetUtilisateur->nomInteret }}</div>
                @endforeach
            @endif
        </div>
    @endforeach

    <div class="interet-overlay" id="overlay" style="display: none;">
        <div class="interet-modal">
            <h3 class="titreModalInteret">Modifier vos intérêts :</h3>
            <button class="close-button-interet"
                onclick="window.location.href='{{ route('profile', Auth::user()->id) }}'">&times;</button>
            <form action="{{ route('interets.update_Interets', Auth::user()->id) }}" method="POST" id="interetForm">
                @csrf
                @method('PUT')

                @if (!empty($categories))
                    @foreach ($categories as $categorie)
                        <div class="interet-categorie-div">
                            <h3>{{ $categorie->nomCategorie }}</h3>
                            @foreach ($interets as $interet)
                                @if ($interet->id_categorie == $categorie->idCategorie)
                                <div class="interet-tag {{ in_array($interet->idInteret, $interetsUtilisateurTab) ? 'interet-selected' : '' }}" 
                                data-id="{{ $interet->idInteret }}">
                                        {{ $interet->nomInteret }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <p>Aucune catégorie trouvée.</p>
                @endif
                <input type="hidden" name="interets" id="interetSelectedInterets" value="{{ implode(',', $interetsUtilisateurTab) }}"> 
                <button type="submit" class="interet-btn-submit">Sauvegarder les changements</button>
                <button type="button" class="interet-btn-annuler" onclick="window.location.href='{{ route('profile', Auth::user()->id) }}'">Annuler</button>

            </form>
        </div>
    </div>
</body>

</html>