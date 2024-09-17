@extends("master")


@section("content")
<link rel="stylesheet" href="{{ asset('css/meetup.css') }}">
<div class="meetup-container">
    <form action="meetup/create" method="POST" class="meetup-form-container">
        @csrf
        <legend style="text-align:center;" class="underline">
            MeetUp
        </legend>

        <div class="form-group">
            <label>Nom de l'évènement :</label>
            @if($errors != [] )
                <div>{{$errors}} </div>
            
            @endif
            <input type="text" class="form-control form-control-sm " name="nom" required>
            <div class="invalid-feedback"></div>
        </div>

        <div class="form-group">
            <label>Description :</label>
            <textarea type="text" class="form-control" name="description"></textarea>
        </div>

        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label>Adresse :</label>
                    <input type="text" class="form-control form-control-sm" placeholder="numéro / nom de la rue" name="adresse" required>
                </div>
                <div class="col">
                    <label>Ville :</label>
                    <input type="text" class="city-dropdown form-control form-control-sm" id="city-dropdown" --
                     placeholder="Choisir une ville" name="ville" required>
                     

                    <div class="city-dropdown-content" id="city-dropdown-content" style="display:none;">
                        @foreach ($listCities as $city)
                            <x-getCities :city="$city" />
                        @endforeach
                    </div>
                    <div class="invalid-feedback"></div>

                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form-row">

                <div class="col">
                    <label>Date :</label>
                    <input type="date" class="form-control form-control-sm" name="date" required>
                </div>
                <div class="col">
                    <label>Heure :</label>
                    <input type="time" class="form-control form-control-sm" name="heure" required>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="form-row">

                <div class="col">
                    <label>Participants</label>
                    <input type="number" class="form-control form-control-sm" min="2" max="100" name="nb_participant" required>
                </div>
                <div class="col">
                    <label>Image</label>
                    <input type="file" id="image" name="image">
                </div>

            </div>
        </div>
        <div class="form-group">

            <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="prive" name="prive">
                <label class="form-check-label" for="prive" for>Privé</label>
            </div>
        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-pink">Créer le MeetUp</button>
            <a class="btn btn-secondary" style="color:white;">Retour</a>
            
        </div>
    </form>
    <br><br><br>
</div>
@endsection()

@section("extraScript")
<script src="/js/meetupForm.js"></script>
@endsection