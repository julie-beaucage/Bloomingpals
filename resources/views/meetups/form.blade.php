@extends("master")
@php

    $action = $data['empty'] ? "/meetup/create" : "/meetup/edit/" . $data['id'];
    if ($action == "/meetup/create") {
        $checked = 0;
        if ($data['isEvent'] != false) {
            $action = '/meetup/create/' . $data['isEvent'];
        }
    } else {
        $checked = $data['public'] == 1 ? 0 : 1;
    }
@endphp
@section('style')
<link rel="stylesheet" href="{{ asset('css/meetupForm.css') }}">

@endsection

@section("content")

<form class="form-meetup" method="POST" action="{{$action}}" enctype="multipart/form-data"
    isEvent="{{$data['isEvent']}}">
    @csrf
    <input type="file" style="display:none" id="fileInput" accept="image/*" name="image" id="image"
        isEvent="{{$data['isEvent']}}">
    <div class="form-header">
        Création d'un <span style="color:var(--secondary-500);">Meetup</span>
    </div>

    <div class="form-title">Informations de base</div>

    <div class="form-section">
        <div class="form-flex-row">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" value="{{$data['name']}}" required>
            <i class="feedback is-wrong"></i>
        </div>


        <div class="form-flex-row">
            <label for="description">Description du Meetup</label>
            <textarea id="description" name="description">{{$data['description']}}</textarea>
            <i class="feedback is-wrong"></i>
        </div>

        <div class="form-flex-row">
            <label for="nb_participant">Nombre de participants</label>
            <input type="number" min="2" max="100" id="number_participant" name="nb_participant" required
                value="{{$data['nb_participant']}}">
            <i class="feedback is-wrong"></i>
        </div>
        <div class="form-flex-col radio-flex" style="gap:.5em; flex-direction:row !important;" toCheck="{{$checked}}">
            <input type="radio" name="public" value="1"><label>Public</label>
            <input type="radio" name="public" value="0"><label>Privé</label>
        </div>


    </div>

    <div class="form-title">Lieu et date</div>

    <div class="form-section">
        <div class="form-flex-col">

            <div class="form-flex-row">
                <label for="adress">Adresse</label>
                <input type="text" placeholder="Numéro / Rue" id="adress" name="adress" value="{{$data['adress']}}"
                    required>
                <i class="feedback is-wrong"></i>
            </div>

            <div class="form-flex-row" style="position:relative;">
                <label for="city-dropdown">Ville</label>

                <input type="text" class="city-dropdown" id="city" placeholder="Choisir une ville" name="city" required
                    value="{{$data['city']}}">
                <div class="city-dropdown-content" id="city-dropdown-content" style="display:none;">
                    @foreach ($listCities as $city)
                        <x-getCities :city="$city" />
                    @endforeach
                </div>
                <i class="feedback is-wrong"></i>
            </div>
        </div>

        <div class="form-flex-col">

            <div class="form-flex-row">
                <label for="date">Date</label>
                <input type="date" min="<?= date('Y-m-d'); ?>" max="<?= date('Y-m-d', strtotime('+5 years')); ?>"
                    id="date" name="date" value="{{$data['date']}}" required>
                <i class="feedback is-wrong"></i>
            </div>

            <div class="form-flex-row">
                <label for="time">Heure</label>
                <input type="time" id="time" name="time" value="{{$data['time']}}" required>

            </div>
        </div>


    </div>

    <div class="form-title">Intérets</div>

    <div class="filter_cntr search_suggestion search_selection" data-url="/search/interests" data-param="interests"
        data-name="name">
        <input id="category_search" type="text" class="search_suggestion_input" placeholder="Rechercher par catégorie"
            style="width:100%;">
        <div id="category_selections" class="selections"></div>
        <div id="category_suggestions" class="suggestions">
        </div>
    </div>

    <div class="form-flex-col spaced" style=" flex-direction:row !important;">
        <div class="form-title">Image</div>
        <div class="image-close cursor" style="display:none;"><span class="material-symbols-rounded">
                close
            </span></div>
    </div>


    <div class="fileUploader cursor drop" id="dragArea">
        <img class="img-preview" style="display:none;" src="{{$data['image'] != null ? asset($data['image']) : ''}}">
        <div class="fileUploader-content drop" style="margin-top:.5em;">
            <span class="material-symbols-rounded drop">add_photo_alternate</span>
        </div>
        <div class="fileUploader-content drop" style="text-align:center; margin-bottom:.5em;">Glisser ou déposer <br>
            votre image</div>

    </div>
    <i class="feedback is-wrong" id="imageFeedback"></i>
    <div class="form-flex-col spaced" style="margin: 3em 0 .5em 0; ">
        <div class="form-flex-col flex-600">
            <button class="btn-meetup green expand center" id="submit" type="submit">Enregistrer</button>
            <button class="btn-meetup gray expand center" onclick='window.location.replace("/home");'>Retour</button>
        </div>
        @if($action != "/meetup/create")
            <div class="btn-meetup red expand center" onclick="Confirm('/meetup/delete/{{$data['id']}}')">Effacer le Meetup
            </div>
        @endif

    </div>


</form>

@endsection

@section("script")
<script>
    const MeetupId = window.location.href.indexOf('event') == -1 ? window.location.href.substring((window.location.origin + '/meetup/form/').length) :
        window.location.href.substring((window.location.origin + '/meetup/form/event/').length);

    let interest_tab = [];
    let interest_ids = [];
    function add_interest(tab) {
        interest_ids = [];
    }
    console.log(MeetupId);
    if (MeetupId != "") {
        fetch(url=window.location.href.indexOf('event') == -1 ? (window.location.origin + '/meetup/interests/' + MeetupId): (window.location.origin + '/event/interests/' + MeetupId)).then(response => {
            if (response.ok) {
                return response.json();
            }
        }).then(data => {
            interest_tab = data;

            let selections = $(".search_suggestion").find(".selections");
            for (var index in interest_tab) {
                var interest = interest_tab[index];
                interest_ids.push(interest.id);
                selections.append($("<span>").attr("class", "selection no_select tag tag_rmv hover_darker")
                    .attr("style", "background-color: var(--category-" + interest.id_category + ")")
                    .text(interest.name));
            }

            selections.children().click(function () {
                for (var index in interest_tab) {
                    if (interest_tab[index].name == $(this).text()) {
                        interest_ids = interest_ids.filter((e) => e != interest_tab[index].id);
                        break;
                    }
                }
                $(this).remove();
            });
        });
    }



    const crsf = $('meta[name="csrf-token"]').attr('content');
    function removePop() {
        $('.pop-up-overlay').remove();
    }
    function removeMeetup(location) {
        $('#deleteMeetup').click(function (e) {
            $.ajax({
                type: "DELETE",
                url: location,
                data: { _token: crsf }
            }).done(() => {
                window.location.href = "/meetup";
            });
        });
    }

    function Confirm(location) {
        var pop_up_box = "<div class='pop-up-overlay'>" +
            "<div class='pop-up'>" +
            "<div style='display:flex; justify-content: space-between; align-items:center; border-bottom: 1px solid black;'>" +
            '<div><strong> Effacer le Meetup ?</strong></div> <a onclick="removePop()" id="close-pop" style="cursor:pointer;"><span class="close_icon">close</span></a>' +
            '</div>' +
            '<div> Êtes-vous certain de vouloir effacer le Meetup ?</div>' +
            '<div style=" display:flex; justify-content:flex-end; gap:.5em; ">' +
            "<button class='btn-primary gray'style='color:white !important;' onclick='removePop()'>Annuler</button> " +
            "<button class='btn-primary red' id='deleteMeetup'>Effacer</button> " +

            "</div>" +
            "</div>";

        $('body').append(pop_up_box);

        removeMeetup(location);
    }

    //$('#city-dropdown-content').hide();
    let selectedOption = null;
    let file;

    //$('#submit').click(function () { $('form').submit(); })

    $(document).ready(function () {
        //image preview when not null
        if ($('.img-preview').attr('src') != '') {
            displayImage(null);

        }

        document.querySelectorAll('input[type="radio"]')[$('.radio-flex').attr('toCheck')].checked = true;

        $(document).on("click", function (event) {
            let dropContent = document.getElementById("city-dropdown-content");
            let inputDropdown = document.getElementById("city");

            if (!(event.target.closest('div') == dropContent) && event.target != inputDropdown) {
                $('#city-dropdown-content').hide();

                if (selectedOption != null) {
                    $("#city").prop("value", selectedOption.val());
                }
            }
        });
        // derouler le dropdown
        $('#city').on("click", function () {
            $('#city-dropdown-content').show();

        });

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
            $("#city").prop("value", selectedOption.val());
        })

        $("#city").on("keyup", function () {
            let texte = $(this).val().toUpperCase();
            let options = document.getElementById("city-dropdown-content").getElementsByTagName("option");

            for (let i = 0; i < options.length; i++) {
                if (options[i].value.toUpperCase().indexOf(texte) < 0) {
                    options[i].style.display = "none";
                } else {
                    options[i].style.display = "";
                }
            }
        });

        //file Uploader
        let numberOfDrag = 0;

        $('.fileUploader').on('dragover', false);
        $('.fileUploader').on("dragenter", function (event) {
            event.originalEvent.preventDefault();
            event.stopPropagation();

            $('.fileUploader').addClass('active');
            numberOfDrag++;

        });
        $('.fileUploader').on("dragleave", function (event) {
            event.originalEvent.preventDefault();
            event.stopPropagation();


            numberOfDrag--;
            if (numberOfDrag == 0) {
                $('.fileUploader').removeClass('active');
            }
        });

        $('.image-close').on('click', function () {

            $('.img-preview').attr('src', '');

            $(".fileUploader-content").each(function () {
                $(this).show();
            });

            $('.fileUploader').removeClass('active-image');
            $(this).hide();
        });

        $('.drop').on('drop', function (event) {
            event.originalEvent.preventDefault();
            event.stopPropagation()
            $('fileUploader').removeClass('active');

            let files = event.originalEvent.dataTransfer.files;
            console.log(files.length);
            if (files.length > 1) {
                $('#imageFeedback').text("Vous ne pouvez pas mettre plusieurs images");
                $('.fileUploader').removeClass('active');
            } else {
                if (checkFile(files[0])) {
                    document.querySelector('input[type=file]').files = files;
                }
            }
        });

        $('.drop').on('click', function (e) {
            e.stopPropagation();
            $('input[type="file"]').click();
        });

        $('input[type="file"]').on('change', function () {

            previewFile();
        });

        function displayImage(image) {
            if (image != null) { $('.img-preview').attr('src', image); }

            $(".fileUploader-content").each(function () {
                $(this).hide();
            });
            $('.fileUploader').removeClass('active');
            $('.fileUploader').addClass('active-image');
            $('.img-preview').show();

            $('.image-close').show();
        }
        function checkFile(file) {
            const allowedMimes = ['image/jpeg', 'image/jpg', 'image/png'];

            if (allowedMimes.includes(file.type)) {
                if (file.size > 2000000) {

                    $('#imageFeedback').text("La taille de l'image doit être plus petit que 2 Mo");
                    $('.fileUploader').removeClass('active');
                } else {
                    //image is Ok

                    //$('input[type="file"]').files=file;
                    $('#imageFeedback').text("");
                    let reader = new FileReader();

                    reader.onloadend = function () {
                        displayImage(reader.result);


                    }
                    reader.readAsDataURL(file);
                    return true;
                }
            } else {
                $('#imageFeedback').text("Le fichier doit être une image");
                $('.fileUploader').removeClass('active');

            }
            return false;

        }
        function previewFile() {
            var preview = $(".img-preview");
            var file = document.querySelector('input[type=file]').files[0];
            checkFile(file);
        }

        let errors;
        let listCities = [];

        let cities = $('#city-dropdown-content').find('option');

        cities.each(function () {
            listCities.push($(this).val().toLowerCase());
        });


        // verification data     
        function showError(element, msg) {
            element.addClass('is-wrong-border');
            element.parent()[0].querySelector('i').innerText = msg;
            errors = true;
        }

        function clearErrors() {
            $('input').removeClass("is-wrong-border");


            $('input').parent().each(function () {
                $(this).find('i').text("");
            });
        }
        $('form').on('submit', function (e) {


            let data = new FormData(e.target);
            errors = false;

            clearErrors();


            let regex_OneLetter = /[a-zA-Z]/;
            //nom
            if (data.get('name').length > 100) {
                showError($('#name'), "Le nom doit être moins long que 100 caractères");
            }

            if (!regex_OneLetter.test(data.get('name'))) {
                showError($('#name'), "Le nom doit contenir au moins une lettre");
            }

            // adresse
            if (!regex_OneLetter.test(data.get('adress'))) {
                showError($('#adress'), "L'adresse doit contenir au moins une lettre");
            }

            if (data.get('adress').length > 100) {
                showError($('#adress'), "L'adresse doit être moins longue que 100 caractères");
            }

            // Description
            if (data.get('description') > 4096) {
                showError($('#description'), "La description doit être moins longue que 1024 caractères");
            }

            // ville
            if (!listCities.includes(data.get('city').toLocaleLowerCase())) {
                showError($('#city'), data.get('city') + "n'est pas une ville");
            }

            //date
            var d = new Date();
            var date = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
            var formDate = data.get('date').split('-');
            formDate = new Date(formDate[0], formDate[1] - 1, formDate[2]);

            if (formDate == 'Invalid Date') {
                showError($('#date'), "La date est invalide");
            } else {

                if (formDate < d) {
                    showError($('#date'), "La date ne peut être dans le passé");
                }
                d.setFullYear(d.getFullYear() + 5);
                if (formDate > d) {
                    showError($('#date'), "La date ne peut être plus que 5 ans dans le futur");
                }
            }
            if (errors == true) {
                e.preventDefault();
            } else {
                let str = "";
                interest_ids.forEach(function (id) { str = str.concat(id, ','); });
                str = str.substring(0, str.length - 1);

                $(this).append($('<input>').attr('name', 'interests').attr('style', 'display:none;').val(str));
            }

            if ($('.img-preview').attr('src') == "") {
                console.log("submit");
                //e.preventDefault();
                //document.querySelector('input[type=file]').value = "";
                document.querySelector('input[type=file]').remove();

                $(this).append($('<input>').attr('name', 'image').attr('style', 'display:none;').val("delete"));
            }
        });

        //code Alexis

        $(".search_suggestion").each(async function () {
            let filter_cntr = $(this);
            let suggestions = null;
            $.ajax({
                url: filter_cntr.data("url"),
                type: "GET",
                success: function (data) {
                    suggestions = data;
                }
            });

            $(this).children('input').keyup(function () {

                if (suggestions == null || suggestions.length == 0 || jQuery.isEmptyObject(suggestions))
                    return;

                let query = $(this).val();
                let url = new URL(window.location.href);
                let suggestions_cntr = filter_cntr.find(".suggestions");

                suggestions_cntr.empty();

                if (query == "" && !filter_cntr.hasClass("search_selection")) {
                    url.searchParams.set(filter_cntr.data("param"), "");
                    window.history.replaceState({}, "", url);
                }

                let closest_match = suggestions[0][filter_cntr.data("name")].normalize("NFD").replace(/[\u0300-\u036f]/g, "");
                if (query.toLowerCase() == closest_match.toLowerCase() && !filter_cntr.hasClass("search_selection")) {
                    url.searchParams.set(filter_cntr.data("param"), closest_match);
                    window.history.replaceState({}, "", url);
                }

                let selection_ids = (filter_cntr.hasClass("search_selection") && url.searchParams.has(filter_cntr.data("param"))) ? url.searchParams.get(filter_cntr.data("param")).split(",").map(e => parseInt(e)) : [];
                let data = (query == "") ? [] : suggestions.filter((sugg) => sugg[filter_cntr.data("name")].toLowerCase().startsWith(query.toLowerCase()) && !interest_ids.includes(sugg["id"])).slice(0, 5);

                for (let i = 0; i < data.length; i++) {

                    let elem = $("<span>").attr("class", "suggestion hover_darker no_select").text(data[i][filter_cntr.data("name")]);
                    suggestions_cntr.append(elem);

                    if (filter_cntr.hasClass("search_selection")) {
                        elem.click(function () {
                            // if (url.searchParams.get(filter_cntr.data("param")) != null && url.searchParams.get(filter_cntr.data("param")).split(",").includes(data[i]["id"] + ""))
                            //     return;

                            let selections = filter_cntr.find(".selections");
                            let selection = $("<span>").attr("class", "selection no_select tag tag_rmv hover_darker").attr("style", "background-color: var(--category-" + data[i]["id_category"] + ")").text(data[i][filter_cntr.data("name")]);
                            selections.append(selection);

                            let selections_list = (url.searchParams.has(filter_cntr.data("param"))) ? url.searchParams.get(filter_cntr.data("param")) : "";
                            selected_interest = (selections_list == "") ? data[i]["id"] : selections_list + "," + data[i]["id"];
                            //window.history.replaceState({}, "", url);
                            let interest = new Object();
                            interest.id = selected_interest; interest.name = data[i][filter_cntr.data("name")]; interest.id_category = data[i]['category'];
                            interest_tab.push(interest);
                            interest_ids.push(selected_interest);


                            selection.click(function () {
                                for (var index in interest_tab) {
                                    if (interest_tab[index].name == $(this).text()) {
                                        interest_ids = interest_ids.filter((e) => e != interest_tab[index].id);
                                        break;
                                    }
                                }
                                selection.remove();
                                let url = new URL(window.location.href);
                                let selections_list = (url.searchParams.has(filter_cntr.data("param"))) ? url.searchParams.get(filter_cntr.data("param")) : "";
                                //url.searchParams.set(filter_cntr.data("param"), selections_list.split(",").filter(e => e != data[i]["id"]).join(","));

                                //window.history.replaceState({}, "", url);
                            });

                            suggestions_cntr.empty();
                            filter_cntr.children('input').val("");
                            filter_cntr.children('input').focus();
                        })
                    }
                    else {
                        elem.click(function () {
                            filter_cntr.children('input').val(data[i][filter_cntr.data("name")]);
                            //url.searchParams.set(filter_cntr.data("param"), data[i][filter_cntr.data("name")].normalize("NFD").replace(/[\u0300-\u036f]/g, ""));

                            //window.history.replaceState({}, "", url);
                            suggestions_cntr.empty();
                        });
                    }
                }
            });
        });
    });
</script>

@endsection