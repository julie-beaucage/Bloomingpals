<div class="custom-overlay" id="overlayInterests" style="display: none;">
    <div class="container-custom-modal">
        <button class="close" onclick="closeModalInteret()">×</button>
        <h3 class="titreModalInteret">Modifier vos intérêts :</h3>
        <form action="{{ route('interets.update_Interets', Auth::user()->id) }}" method="POST" id="interetForm">
            @csrf
            @method('PUT')
            @if (!empty($categories))
                @foreach ($categories as $categorie)
                    <div class="interet-categorie-div categorie-{{ strtolower($categorie->name) }}">
                        <h3>{{ $categorie->name }}</h3>
                        @foreach ($interets as $interet)
                            @if ($interet->id_category == $categorie->id)
                                <div class="interet-tag interet-{{ strtolower($categorie->name) }} {{ in_array($interet->id, $interetsUtilisateurTab) ? 'interet-selected' : '' }}"
                                    data-id="{{ $interet->id}}">
                                    {{ $interet->name }}
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endforeach
            @else
                <p>Aucune catégorie trouvée.</p>
            @endif
            <input type="hidden" name="interets" id="interetSelectedInterets"
                value="{{ implode(',', $interetsUtilisateurTab) }}">
            <button type="submit" class="btnProfile">Sauvegarder les changements</button>
            <button type="button" class="interet-btn-annuler" onclick="closeModalInteret()">Annuler</button>
        </form>
    </div>
</div>