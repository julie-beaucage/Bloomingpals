<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/interets.css') }}">
    <title>Mes Intérêts</title>
</head>

<body>
    <h1>Tes intérêts :</h1>
    @foreach ($categories as $categorie)
        <div class="categorie-div">
            <h2>{{ $categorie->nomCategorie }}</h2>

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
                <p>Aucun intérêt dans la catégorie {{ $categorie->nomCategorie }}.</p>
            @else
                @foreach ($interetsPourCategorie as $interetUtilisateur)
                    <div class="tag">{{ $interetUtilisateur->nomInteret }}</div>
                @endforeach
            @endif
        </div>
    @endforeach

    <button class="buttonDetail btn btn-primary" id="openOverlay">Modifier vos intérêts</button>

    <div class="interet-overlay" id="overlay" style="display: none;">
        <div class="interet-modal">
            <h1>Modifier vos intérêts :</h1>
            <button class="close-button"
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
                                    <div class="interet-tag {{ in_array($interet->idInteret, $interetsUtilisateur->pluck('id_interet')->toArray()) ? 'interet-selected' : '' }}"
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
                <input type="hidden" name="interets" id="interetSelectedInterets" value="{{ implode(',', $interetsUtilisateur) }}"> 

                <button type="submit" class="interet-btn-primary">Sauvegarder les changements</button>
            </form>
        </div>
    </div>

    <script>
            document.getElementById('openOverlay').addEventListener('click', function () {
            document.getElementById('overlay').style.display = 'block';
        });
    </script>

</body>

</html>