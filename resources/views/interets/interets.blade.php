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
    <a id="testId" href="">TestButton</a>
    @if ($user->id == Auth::user()->id)
        <button class="buttonDetail btn btn-primary" id="openOverlay">
        <i class="fas fa-pencil-alt" style="color: black;"></i>
    @endif
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

        @include ('interets/interetEdit')
    </div>
</body>

</html>
