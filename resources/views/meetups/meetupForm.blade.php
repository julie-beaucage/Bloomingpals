@extends("master")




@section("content")
<link rel="stylesheet" href="{{ asset('css/meetup.css') }}">
<div class="meetup-container">
    <form class="meetup-form-container">
        <legend style="text-align:center;" class="underline">
            Rencontre
        </legend>
        <div class="form-group">

            <label>Nom de l'évènement :</label>

            <input type="text" class="form-control form-control-sm">

        </div>
        <div class="form-group">

            <label>Description :</label>

            <textarea type="text" class="form-control "></textarea>

        </div>
        <div class="form-group">
            <div class="form-row">

                <div class="col">
                    <label>Adresse :</label>

                    <input type="text" class="form-control form-control-sm">
                </div>

                <div class="col">
                    <label>Ville :</label>

                    <input type="text" class="city-dropdown form-control form-control-sm" id="city-dropdown" placeholder="Choisir une ville">
                    <div class="city-dropdown-content" id="city-dropdown-content" style="display:none;">
                        @foreach ($listCities as $city)
                            <x-getCities :city="$city" />

                        @endforeach

                    </div>

                    <!-- <select class="form-control form-control-sm" id="select-city" placeholder="Choisir une ville">
                        <option></option>


                    </select> -->
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label>Date :</label>

                    <input type="text" class="form-control form-control-sm">
                </div>

                <div class="col">
                    <label>Heure :</label>

                    <input type="text" class="form-control form-control-sm">

                </div>
            </div>
        </div>
    </form>
</div>

@endsection()

@section("extraScript")
<script src="/js/meetupForm.js"></script>
@endsection