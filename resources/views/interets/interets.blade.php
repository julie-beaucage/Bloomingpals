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
                <div class="tag interet-{{ strtolower($categorie->nomCategorie) }}">{{ $interetUtilisateur->nomInteret }}</div>
                @endforeach
            @endif
        </div>
    @endforeach

@include ('interets/interetEdit')
</body>

</html>