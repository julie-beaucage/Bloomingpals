@extends("master")

@section("content")
<link rel="stylesheet" href="{{ asset('css/meetup.css') }}">
<div class="meetup-container">
    <form class="meetup-form-container">
        <legend style="text-align:center;" class="underline">
            Rencontre
        </legend>
        <div class="form-group">

            <label >Nom de l'évènement :</label>

            <input type="text" class="form-control form-control-sm">

        </div>
        <div class="form-group">

            <label >Description :</label>

            <textarea type="text" class="form-control "></textarea>

        </div>
        <div class="form-row">

        <div class="col">
                <label>Adresse :</label>

                <input type="text" class="form-control form-control-sm">
            </div>

           <div class="col">
                <label >Ville :</label>

                <select class="form-control form-control-sm">
                    <option selected>Choisir</option>
                    @foreach ( $listCities as $city )
                    <x-getCities :city="$city"/>
                    
                    @endforeach
                   
                </select>

           </div>

        </div>
        <div class="form-row">
            <div class="col">
                <label>Date :</label>

                <input type="text" class="form-control form-control-sm">
            </div>

           <div class="col">
                <label >Heure :</label>

                <input type="text" class="form-control form-control-sm">

           </div>
            

        </div>
    </form>
</div>

@endsection()