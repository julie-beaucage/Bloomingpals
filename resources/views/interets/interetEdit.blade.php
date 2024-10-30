<div class="custom-overlay" id="overlayInterests" style="display: none;">
    <div class="container-custom-modal">
        <div class="header">
            <span class="title no_wrap">Modifier vos intérêts</span>
            <button class="close"  data-modal-id="overlayInterests">
                <span class="material-symbols-rounded">close</span>
            </button>
        </div>
        <div class="body">
            <form action="{{ route('interets.update_Interets', Auth::user()->id) }}" method="POST" id="interetForm">
                @csrf
                @method('PUT')
                @if (!empty($categories))
                    @foreach ($categories as $categorie)
                        <div class="interet-categorie-div categorie-{{ strtolower($categorie->name) }}">
                            <span class="title">{{ $categorie->name }}</span>
                            <div class="tags_cntr">
                                @foreach ($interets as $interet)
                                    @if ($interet->id_category == $categorie->id)
                                        <div class="tag interet-tag interet-{{ strtolower($categorie->name) }} {{ in_array($interet->id, $interetsUtilisateurTab) ? 'interet-selected' : '' }}"
                                            data-id="{{ $interet->id}}">
                                            {{ $interet->name }}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Aucune catégorie trouvée.</p>
                @endif
                <input type="hidden" name="interets" id="interetSelectedInterets"
                    value="{{ implode(',', $interetsUtilisateurTab) }}">
                <button type="submit" class="submit-btn">Sauvegarder les changements</button>
            </form>
        </div>
    </div>
</div>