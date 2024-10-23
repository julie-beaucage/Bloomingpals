@extends("master")

@section("style")
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
@endsection()

@section("content")
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

@section("script")
    <script>
        $(document).ready(function() {

            function refresh() {
                let url = new URL(window.location.href);
                let category = url.searchParams.get("category");
                let query = url.searchParams.get("query");
                
                $.ajax({
                    url: "/search/" + category,
                    type: "GET",
                    success: function(data) {
                        $("#result").html(data);
                    },
                    data: {
                        'query': query
                    }
                });
            }

            // Init
            let url = new URL(window.location.href);
            let category = url.searchParams.get("category");
            if (category == null) {
                url.searchParams.set("category", "meetups");
                window.history.replaceState({}, "", url);
                category = "meetups";
            }
            $("#search_categories > button[value='" + category + "']").addClass("selected");
            refresh();
            
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
                
                refresh();
            });

            $("#search_field").keyup(function() {
                let query = $(this).val();
                let url = new URL(window.location.href);
                url.searchParams.set("query", query);
                window.history.replaceState({}, "", url);
                refresh();
            });
        });
    </script>
@endsection()