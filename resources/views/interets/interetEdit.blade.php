<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/interets.css') }}">
    <title>@yield("title", "Modifier les intérêts")</title>
</head>

<body>
    <div class="interet-overlay">
        <div class="interet-modal">
            <h1>Modifier vos intérêts :</h1>
            <button class="close-button" onclick="window.location.href='{{ route('interets.interets', Auth::user()->id) }}'">&times;</button>

            <form action="{{ route('interets.update_Interets') }}" method="POST" id="interetForm">
                @csrf 
                @method('PUT') 

                @if (!empty($categories)) 
                    @foreach ($categories as $categorie)
                        <div class="interet-categorie-div">
                            <h3>{{ $categorie->nom }}</h3> 
                            @foreach ($interets as $interet)
                                @if ($interet->id_categorie == $categorie->id) 
                                    <div class="interet-tag {{ in_array($interet->interet_id, $interetsUtilisateur) ? 'interet-selected' : '' }}" 
                                         data-id="{{ $interet->interet_id }}">
                                        {{ $interet->interet_nom }}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                @else
                    <p>Aucune catégorie trouvée.</p>
                @endif

                <input type="hidden" name="interets" id="interetSelectedInterets" value="{{ implode(',', $interetsUtilisateur) }}"> <!-- Champ caché pour les intérêts sélectionnés -->

                <button type="submit" class="interet-btn-primary">Sauvegarder les changements</button>
            </form>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>
