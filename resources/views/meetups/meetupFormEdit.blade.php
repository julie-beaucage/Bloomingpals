@extends("master")

@section("content")
@if($data != null)
    <link rel="stylesheet" href="{{ asset('css/meetup.css') }}">
    <div class="meetup-container">
        <form action="/meetup/edit" method="POST" class="meetup-form-container">
            @csrf
            <legend style="text-align:center;" class="underline">
                MeetUp
            </legend>

            <div class="form-group">
                <label>Nom de l'évènement :</label>

                @if($errors['nom'] != '')
                    <input type="text" class="form-control form-control-sm is-invalid" name="nom" required
                        value="{{$data['nom']}}">
                    <div class="invalid-feedback">{{$errors['nom']}}</div>
                @else
                    <input type="text" class="form-control form-control-sm is-invalid" name="nom" required
                        value="{{$data['nom']}}">
                @endif

            </div>

            <div class="form-group">
                <label>Description :</label>

                @if($errors['description'] != '')
                    <textarea type="text" class="form-control is-invalid" name="description">{{$data['description']}}</textarea>
                    <div class="invalid-feedback">{{$errors['description']}}</div>
                @else
                    <textarea type="text" class="form-control" name="description">{{$data['description']}}</textarea>

                @endif
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="col">
                        <label>Adresse :</label>

                        @if($errors['adresse'] != '')
                            <input type="text" class="form-control form-control-sm is-invalid"
                                placeholder="numéro / nom de la rue" name="adresse" required value="{{$data['adresse']}}">
                            <div class="invalid-feedback">{{$errors['adresse']}}</div>
                        @else
                            <input type="text" class="form-control form-control-sm" placeholder="numéro / nom de la rue"
                                name="adresse" required value="{{$data['adresse']}}">
                        @endif

                    </div>
                    <div class="col">
                        <label>Ville :</label>

                        @if($errors['ville'] != '')
                            <input type="text" class="city-dropdown form-control form-control-sm is-invalid" id="city-dropdown"
                                placeholder="Choisir une ville" name="ville" required value="{{$data['ville']}}">

                        @else
                            <input type="text" class="city-dropdown form-control form-control-sm" id="city-dropdown" --
                                placeholder="Choisir une ville" name="ville" required value="{{$data['ville']}}">
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

                        <input type="date" class="form-control form-control-sm" name="date" min="<?= date('Y-m-d'); ?>"
                            max="<?= date('Y-m-d', strtotime('+5 years')); ?>" required id="date" value="{{$data['date']}}">

                    </div>
                    <div class="col">
                        <label>Heure :</label>
                        <input type="time" class="form-control form-control-sm" name="heure" required
                            value="{{$data['heure']}}">
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="form-row">

                    <div class="col">
                        <label>Participants</label>

                        <input type="number" class="form-control form-control-sm" min="2" max="100" name="nb_participant"
                            required value="{{$data['participant']}}">
                    </div>
                    <div class="col">
                        <label>Image</label>
                        <input type="file" id="image" name="image" accept="image/*">
                    </div>

                </div>
            </div>
            <div class="form-group">

                <div class="form-check mb-2">

                    @if($data['public'] == true)
                        <input class="form-check-input" type="checkbox" id="prive" name="prive">
                    @else
                        <input class="form-check-input" type="checkbox" id="prive" name="prive" checked>
                    @endif

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

    @section("scripts")
    <script>
        $('#city-dropdown-content').hide();
        let selectedOption = null;

        $(document).ready(function () {
            // click outside du dropdown
            $(document).on("click", function (event) {
                let dropContent = document.getElementById("city-dropdown-content");
                let inputDropdown = document.getElementById("city-dropdown");

                if (!(event.target.closest('div') == dropContent) && event.target != inputDropdown) {
                    $('#city-dropdown-content').hide();

                    if (selectedOption != null) {
                        $("#city-dropdown").prop("value", selectedOption.val());
                    }
                }
            });
            // derouler le dropdown
            $('#city-dropdown').on("click", function () {
                $('#city-dropdown-content').show();

            });

            // sur click objet dropdown

            $("option").on('click', function () {
                console.log($(this).attr("selected"));
                if (selectedOption == null) {
                    $(this).attr("selected", "selected");
                    $(this).addClass("selected");
                    selectedOption = $(this);
                } else {
                    if ($(this).attr("selected") === undefined) {
                        $(this).attr("selected", "selected");
                        selectedOption.removeAttr("selected");
                        selectedOption.removeClass("selected");
                        selectedOption = $(this);
                        $(this).addClass("selected");
                    }
                }
                $("#city-dropdown").prop("value", selectedOption.val());
            })

            $("#city-dropdown").on("keyup", function () {
                let texte = $(this).val().toUpperCase();
                console.log(texte);
                let options = document.getElementById("city-dropdown-content").getElementsByTagName("option");

                for (let i = 0; i < options.length; i++) {
                    if (options[i].value.toUpperCase().indexOf(texte) < 0) {
                        options[i].style.display = "none";
                    } else {
                        options[i].style.display = "";
                    }
                }
            });

        });

    </script>
    @endsection
@else
    <div> Error</div>
@endif