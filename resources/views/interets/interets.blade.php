<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/interets.css') }}">
    <title>@yield("title", "Mes Intérêts")</title>
</head>

<body>
    <h1>Tes intérêts :</h1>

    @foreach ($categories as $categorie)
        <div class="categorie-div">
            <h2>{{ $categorie->nom }}</h2>

            @php
                // Filtrer les intérêts de l'utilisateur pour cette catégorie
                $interetsUtilisateur = $interets->filter(function($interet) use ($categorie) {
                    return $interet->categorie_id == $categorie->id;
                });
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
            <button class="closeOverlayBtn">&times;</button>

            <form action="{{ route('interets.update_Interets') }}" method="POST" id="interetForm">
                @csrf 
                @method('PUT') 

                @if (!empty($categories)) 
                    @foreach ($categories as $categorie)
                        <div class="interet-categorie-div">
                            <h3>{{ $categorie->nom }}</h3> 
                            @foreach ($interets as $interet)
                                @if ($interet->id_categorie == $categorie->id) 
                                    <div class="interet-tag" data-id="{{ $interet->interet_id }}">
                                        {{ $interet->interet_nom }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <p>Aucune catégorie trouvée.</p>
                @endif

                <input type="hidden" name="interets" id="interetSelectedInterets" value=""> <!-- Champ caché pour les intérêts sélectionnés -->

                <button type="submit" class="interet-btn-primary">Sauvegarder les changements</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        console.log("Script JavaScript chargé avec succès.");

        $(document).on("click", "#openOverlay", function () {
            console.log("Bouton Modifier cliqué.");
            $("#overlay").css("display", "block"); // Assure que l'overlay est visible
        });

        $(document).on("click", ".closeOverlayBtn", function () {
            console.log("Fermeture de l'overlay.");
            $("#overlay").css("display", "none"); // Cache l'overlay
        });

        const interetTags = document.querySelectorAll('.interet-tag');
        const interetSelectedInteretsInput = document.getElementById('interetSelectedInterets');

        interetTags.forEach(tag => {
            tag.addEventListener('click', () => {
                tag.classList.toggle('interet-selected'); 
                updateSelectedInterets(); 
            });
        });

        function updateSelectedInterets() {
            const selectedIds = Array.from(document.querySelectorAll('.interet-tag.interet-selected'))
                                     .map(tag => tag.getAttribute('data-id'));
            interetSelectedInteretsInput.value = selectedIds.join(','); 
        }
    });
</script>

</body>
</html>
