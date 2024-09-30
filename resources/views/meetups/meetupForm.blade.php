@extends("master")

@section("content")

    <!-- <x-meetupFormPop :actionCreate="$actionCreate" :data="$data" :errors="$errors" :listCities="$listCities"/> -->

    @php
    $action = $actionCreate ? "/meetup/create" : "/meetup/edit/".$data['id'];
@endphp

<link rel="stylesheet" href="{{ asset('css/meetupForm.css') }}">
<div class="meetup-container">
    <form action="{{$action}}" method="POST" class="meetup-form-container" enctype="multipart/form-data">
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

            <label>Participants</label>
            @if($data != null)
                <input type="number" class="form-control form-control-sm" min="2" max="100" name="nb_participant" required
                    value="{{$data['participant']}}">
            @else
                <input type="number" class="form-control form-control-sm" min="2" max="100" name="nb_participant" required>
            @endif

        </div>
        <div class="form-group">
            </div>
            <div class="fileUploader-container">
                <div class="fileUploader-header">
                    <div style="width:fit-content;">
                        <input type="file" id="selectedFile" style="display: none;" accept="image/*"
                            onchange="previewFile()" name="image" />
                        <input type="button" value="Choisir une image" class="fileUploader-header-btn"
                            onclick="document.getElementById('selectedFile').click();" />
                        
                    </div>
                    <div style="padding-left:.5em; font-size:.8em; height:fit-content; overflow: hidden;">
                            Il se peut que votre image soit redimensionnée
                        </div>
                </div>
                <div style="max-width:98%; margin:.5em;">       
            @if($data != null)
                @if($data['temporaryImage'] != ' ')
                    <img class="img-preview" src="{{asset($data['temporaryImage'])}}">
                @else
                <img class="img-preview" id="2" src="{{asset($data['image'])}}">
                @endif
            @else
                <img class="img-preview">
            @endif
            </div>

             @if($data!=null)
                @if($data['temporaryImage'] != ' ')
                <input type="text" name="temporaryImage" hidden value="{{$data['temporaryImage']}}">
                @endif
            @endif 
        </div>
        <div class="form-group">

            <div class="form-check mb-2">
                @if($data != null)
                    @if($data['public'] == true)
                        <input class="form-check-input" type="checkbox" id="prive" name="prive">
                    @else
                        <input class="form-check-input" type="checkbox" id="prive" name="prive" checked>
                    @endif
                @else
                    <input class="form-check-input" type="checkbox" id="prive" name="prive">
                @endif
                <label class="form-check-label" for="prive">Privé</label>
            </div>
        </div>

        <div class="form-group">

            <button type="submit"
                class="btn btn-pink">{{$actionCreate ? "Crée le MeetUp" : "Modifier le MeetUp"}}</button>
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

    function previewFile() {
        var preview = $(".img-preview");
        var file = document.querySelector('input[type=file]').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            $(".img-preview").attr('src', reader.result);
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }

</script>

@endsection