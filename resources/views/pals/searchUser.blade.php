@extends('master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection

@section('content')
    <div id="search_cntr">
        <div id="search_header">
            <div id="inputs_cntr">
                <input type="text" id="search_field" class="no_select" placeholder="Rechercher des amis">
                <button id="filter_btn" class="hover_darker no_select" type="button">
                    <span class="material-symbols-rounded">filter_vintage</span>
                </button>
            </div>
        </div>
        <div id="result" class="cards_list">
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let last_data = "";
            let curr_page = 1;
            goTo(1, true);

            function goTo(page, refresh = false) {
                let url = new URL(window.location.href);
                if (refresh) window.scrollTo(0, 0);

                $.ajax({
                    url: "/users",  
                    type: "GET",
                    data: { 'page': page, 'query': $("#search_field").val() }, // Inclure la requête de recherche
                    success: function(data) {
                        if (data != last_data) last_data = data;

                        if (data == "" && page == 1) {
                            $("#result").html('<div id="result_msg"><span>Aucun ami trouvé</span></div>');
                            return;
                        }

                        if (refresh) {
                            $("#result").empty();
                            curr_page = 1;
                        }

                        $("#result").append(data);
                    }
                });
            }

            $("#search_field").keydown(function(e) {
                if (e.keyCode != 13) return;
                goTo(1, true);
            });

            let timeout = null;
            $("#search_field").keyup(function() {
                clearTimeout(timeout);
                let query = $(this).val();
                let url = new URL(window.location.href);
                url.searchParams.set("query", query);
                window.history.replaceState({}, "", url);

                timeout = setTimeout(function() {
                    goTo(1, true);
                }, 350);
            });
        });
    </script>
@endsection
