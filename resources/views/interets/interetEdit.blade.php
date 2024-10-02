<div class="interet-overlay" id="overlay" style="display: none;">
        <div class="interet-modal">
            <h1>Modifier vos intérêts :</h1>
            <button class="close-button" onclick="window.location.href='{{ route('profile', Auth::user()->id) }}'">&times;</button>

            <form action="{{ route('interets.update_Interets') }}" method="POST" id="interetForm">
            @csrf 
                @method('PUT') 
                @if (!empty($categories)) 
                    @foreach ($categories as $categorie)
                        <div class="interet-categorie-div">
                            <h3>{{ $categorie->nom }}</h3> 
                            @foreach ($interets as $interet)
                                @if ($interet->id_categorie == $categorie->id) 
                                    <div class="interet-tag interet-{{ strtolower($categorie->nomCategorie) }} {{ in_array($interet->id, $interetsUtilisateur) ? 'interet-selected' : '' }}" 
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
                <button type="submit" class="interet-btn-submit">Sauvegarder les changements</button>
                <button type="button" class="interet-btn-annuler" onclick="window.location.href='{{ route('profile', Auth::user()->id) }}'">Annuler</button>

            </form>
        </div>
    </div>