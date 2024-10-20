@extends('master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection()

@section('content')
    <div id="search_cntr">
        <div id="search_header">
            <div id="inputs_ctnr">
                <input type="text" id="search_field" class="no_select" placeholder="Rechercher">
                <button id="filter_btn" class="hover_darker no_select" value="meetups" type="button">
                    <span class="material-symbols-rounded">
                        filter_vintage
                    </span>
                </button>
            </div>
            <div id="categories_ctnr">
                <button class="hover_darker no_select" value="meetups" type="button">Rencontres</button>
                <button class="hover_darker no_select" value="events" type="button">Évènements</button>
                <button class="hover_darker no_select" value="users" type="button">Utilisateurs</button>
            </div>
        </div>

        <div id="result" class="cards_container">
        </div>
    </div>
@endsection()

@section('script')
    <script>
        $(document).ready(function() {

            let last_data = "";
            let curr_page = 1;
            let url = new URL(window.location.href);
            let category = url.searchParams.get("category");
            if (category == null) {
                url.searchParams.set("category", "meetups");
                window.history.replaceState({}, "", url);
                category = "meetups";
            }
            $("#categories_ctnr > button[value='" + category + "']").addClass("selected");

            $("#content").prepend(`
                <div id="filters_ctnr" class="hidden">
                    <div id="absolute_ctnr">
                        <div id="filters">
                            <div class="header">
                                <span class="title">Filtres de recherche</span>
                                <span id="close_filter_btn" class="material-symbols-rounded no_select pointer">close</span>
                            </div>
                            <span>Distance</span>
                            <input type="range" min="0" max="100" value="50">

                            <span>Intérêts</span>
                            <div id="interests_ctnr">
                                <span class="tag">Sport
                                    <span class="material-symbols-rounded">close</span>
                                </span>
                                <span class="tag">Musique
                                    <span class="material-symbols-rounded">close</span>
                                </span>
                                <span class="tag">Cuisine
                                    <span class="material-symbols-rounded">close</span>
                                </span>
                                <span class="tag">Jeux vidéos
                                    <span class="material-symbols-rounded">close</span>
                                </span>
                            <div>
                        </div>
                    </div>
                </div>
            `)
            
            goTo(1, true);

            function goTo(page, refresh = false) {
                let url = new URL(window.location.href);
                let category = url.searchParams.get("category");
                let query = url.searchParams.get("query");

                if (refresh)
                    window.scrollTo(0, 0);

                $.ajax({
                    url: "/search/" + category,
                    type: "GET",
                    success: function(data) {

                        if (data != last_data)
                            last_data = data;

                        if (data == "" && page == 1) {
                            $("#result").html('<div id="result_msg"><span>Aucun résultat</span></div>');
                            return;
                        }

                        if (refresh) {
                            $("#result").empty();
                            curr_page = 1;
                        }
                            

                        $("#result").append(data);
                    },
                    data: {
                        'query': query,
                        'page': page
                    }
                });
            }

            // Events
            $("#categories_ctnr > button").click(function() {
                let category = $(this).val();
                let url = new URL(window.location.href);

                if (category == url.searchParams.get("category"))
                    return;
                url.searchParams.set("category", category);
                window.history.replaceState({}, "", url);

                $("#categories_ctnr > button").removeClass("selected");
                $(this).addClass("selected");

                goTo(1, true);
            });

            $("#search_field").keydown(function(e) {
                if (e.keyCode == 13) {
                    goTo(1, true);
                }
            });

            let isSearching = false;
            $("#search_field").keyup(function() {
                let query = $(this).val();
                let url = new URL(window.location.href);
                url.searchParams.set("query", query);
                window.history.replaceState({}, "", url);

                if (isSearching)
                    return;

                isSearching = true;
                $("#result").delay(250).queue(function() {
                    goTo(1, true);
                    isSearching = false;
                    $(this).dequeue();
                });
            });

            $("#filter_btn").click(function() {
                if ($("#filters_ctnr").hasClass("hidden"))
                    $("#filters_ctnr").removeClass("hidden");

                if (!$("#content").hasClass("no_overflow"))
                    $("#content").removeClass("no_overflow");
            });

            $("#close_filter_btn").click(function() {
                if (!$("#filters_ctnr").hasClass("hidden"))
                    $("#filters_ctnr").addClass("hidden");

                if ($("#content").hasClass("no_overflow"))
                    $("#content").removeClass("no_overflow");
            });

            let isLoading = false;
            $("#content").scroll(function() {
                if ($("#content").scrollTop() + $("#content").height() < $("#result").height() - 200)
                    return;

                if (isLoading)
                    return;

                isLoading = true;
                curr_page++;
                goTo(curr_page);
                $("#result").delay(500).queue(function() {
                    isLoading = false;
                    $(this).dequeue();
                });
            });
        });
    </script>
@endsection()
