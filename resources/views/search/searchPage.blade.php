@extends('master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
@endsection()

@section('content')
    <div id="search_cntr">
        <div id="search_inputs">
            <input type="text" id="search_field" placeholder="Rechercher">
            <div id="search_categories">
                <button class="hover_darker" value="meetups" type="button">Rencontres</button>
                <button class="hover_darker" value="events" type="button">Évènements</button>
                <button class="hover_darker" value="users" type="button">Utilisateurs</button>
            </div>
        </div>

        <div id="result">
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
            $("#search_categories > button[value='" + category + "']").addClass("selected");
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
                            $("#result").html("<span>Aucun résultat</span>");
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
            $("#search_categories > button").click(function() {
                let category = $(this).val();
                let url = new URL(window.location.href);

                if (category == url.searchParams.get("category"))
                    return;

                url.searchParams.set("category", category);
                window.history.replaceState({}, "", url);

                $("#search_categories > button").removeClass("selected");
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
