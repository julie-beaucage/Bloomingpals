<div class="containerInteretOnglet">
    @include ('interets/interetEdit')
    @if ($user->id == Auth::user()->id)
        <div class="buttonOverlayContainerInteret">
            <button class="buttonGlass" id="openInterestOverlay" title="Modifier intérêt">
                <span class="material-symbols-rounded" style="font-size: 24px; color: black;">edit</span>
            </button>
        </div>
    @endif
    @foreach ($categories as $categorie)
        <div class="interet-categorie-div categorie-{{ strtolower($categorie->name) }}">
            <h6>{{ $categorie->name }}</h6>
            @php
                $interetsPourCategorie = [];
            @endphp

            @foreach ($interetsUtilisateur as $interetUtilisateur)

                @if ($interetUtilisateur->idCategorie == $categorie->id)
                    @php
                        $interetsPourCategorie[] = $interetUtilisateur; 
                    @endphp
                @endif
            @endforeach

            @if (empty($interetsPourCategorie))
                <p>Aucun intérêt dans cette catégorie {{ $categorie->name }}.</p>
            @else
                @foreach ($interetsPourCategorie as $interetUtilisateur)
                    <div class="tag interet-{{ strtolower($categorie->name) }}">{{ $interetUtilisateur->InterestName}}
                    </div>
                @endforeach
            @endif
        </div>
    @endforeach
</div>