@extends("master")

@section("content")
<link rel="stylesheet" href="{{ asset('css/meetup.css') }}">
<div class="meetup-container">
    <form action="/meetup/create" method="POST" class="meetup-form-container">
        @csrf
        <legend style="text-align:center;" class="underline">
            MeetUp
        </legend>

        <div class="form-group">
            <label>Nom de l'évènement :</label>
            @if($data != null)
                @if($errors['nom'] == '')
                    <input type="text" class="form-control form-control-sm" name="nom" required value="{{$data['nom']}}">
                @else
                    <input type="text" class="form-control form-control-sm is-invalid" name="nom" required
                        value="{{$data['nom']}}">
                    <div class="invalid-feedback">{{$errors['nom']}}</div>
                @endif
            @else
                <input type="text" class="form-control form-control-sm" name="nom" required>
            @endif



        </div>

        <div class="form-group">
            <label>Description :</label>
            @if($data != null)
                @if($errors['description'] == '')
                    <textarea type="text" class="form-control" name="description">{{$data['description']}}</textarea>
                @else
                    <textarea type="text" class="form-control is-invalid" name="description">{{$data['description']}}</textarea>
                    <div class="invalid-feedback">{{$errors['description']}}</div>
                @endif
            @else
                <textarea type="text" class="form-control" name="description"></textarea>
            @endif

        </div>

        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label>Adresse :</label>

                    @if($data != null)
                        @if($errors['adresse'] == '')
                            <input type="text" class="form-control form-control-sm" placeholder="numéro / nom de la rue"
                                name="adresse" required value="{{$data['adresse']}}">
                        @else
                            <input type="text" class="form-control form-control-sm is-invalid"
                                placeholder="numéro / nom de la rue" name="adresse" required value="{{$data['adresse']}}">
                            <div class="invalid-feedback">{{$errors['adresse']}}</div>

                        @endif
                    @else
                        <input type="text" class="form-control form-control-sm" placeholder="numéro / nom de la rue"
                            name="adresse" required>

                    @endif

                </div>
                <div class="col">
                    <label>Ville :</label>

                    @if($data != null)
                        @if($errors['ville'] == '')
                            <input type="text" class="city-dropdown form-control form-control-sm" id="city-dropdown" --
                                placeholder="Choisir une ville" name="ville" required value="{{$data['ville']}}">


                        @else
                            <input type="text" class="city-dropdown form-control form-control-sm is-invalid" id="city-dropdown"
                                placeholder="Choisir une ville" name="ville" required value="{{$data['ville']}}">

                        @endif
                    @else
                        <input type="text" class="city-dropdown form-control form-control-sm" id="city-dropdown" --
                            placeholder="Choisir une ville" name="ville" required>

                    @endif

                    <div class="city-dropdown-content" id="city-dropdown-content" style="display:none;">
                        @foreach ($listCities as $city)
                            <x-getCities :city="$city" />
                        @endforeach
                    </div>

                    @isset($data)
                        @if($errors['ville'] != '')
                            <div class="invalid-feedback">{{$errors['ville']}}</div>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col">
                    <label>Date :</label>

                    @if($data != null)
                        <input type="date" class="form-control form-control-sm" name="date" min="<?= date('Y-m-d'); ?>"
                            max="<?= date('Y-m-d', strtotime('+5 years')); ?>" required id="date" value="{{$data['date']}}">
                    @else
                        <input type="date" class="form-control form-control-sm" name="date" min="<?= date('Y-m-d'); ?>"
                            required id="date" max="<?= date('Y-m-d', strtotime('+5 years')); ?>">
                    @endif

                </div>
                <div class="col">
                    <label>Heure :</label>
                    @if($data != null)
                        <input type="time" class="form-control form-control-sm" name="heure" required
                            value="{{$data['heure']}}">
                    @else
                        <input type="time" class="form-control form-control-sm" name="heure" required>
                    @endif
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="form-row">

                <div class="col">
                    <label>Participants</label>
                    @if($data != null)
                        <input type="number" class="form-control form-control-sm" min="2" max="100" name="nb_participant"
                            required value="{{$data['participant']}}">
                    @else
                        <input type="number" class="form-control form-control-sm" min="2" max="100" name="nb_participant"
                            required>
                    @endif

                </div>
                <div class="col">
                    <label>Image</label>
                    <input type="file" id="image" name="image" accept="image/*">
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