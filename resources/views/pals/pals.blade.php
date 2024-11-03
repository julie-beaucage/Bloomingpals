@extends('master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection

@section('content')
<h2>Les Pals </h2>
<div id="relative_cntr" class="hidden">
    <div id="absolute_cntr">
        <div class="filters_cntr">
            <div class="header">
                <span class="title">Filtres de recherche</span>
                <span id="close_filter_btn" class="material-symbols-rounded no_select pointer">close</span>
            </div>
            <div class="content">
                <div class="filter_cntr selection_grid" data-param="group-personality">
                    <div class="selection_cell no_select hover_darker" style="background-color: var(--category-1)"
                        data-id="analystes">
                        Analyste
                        <span class="material-symbols-rounded">
                            psychology
                        </span>
                    </div>
                    <div class="selection_cell no_select hover_darker" style="background-color: var(--category-5)"
                        data-id="diplomates">
                        Diplomate
                        <span class="material-symbols-rounded">
                            handshake
                        </span>
                    </div>
                    <div class="selection_cell no_select hover_darker" style="background-color: var(--category-3)"
                        data-id="sentinelles">
                        Sentinelle
                        <span class="material-symbols-rounded">
                            health_and_safety
                        </span>
                    </div>
                    <div class="selection_cell no_select hover_darker" style="background-color: var(--category-4)"
                        data-id="explorateurs">
                        Explorateur
                        <span class="material-symbols-rounded">
                            explore
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
        @include('partial_views.user_cards')
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function () {
    let timeout;

    $("#search_field").keyup(function () {
        clearTimeout(timeout);
        let query = $(this).val();
        let url = new URL(window.location.href);
        url.searchParams.set("query", query);
        window.history.replaceState({}, "", url);

        timeout = setTimeout(function () {
            searchUsers(query, $('.selection_cell.selected').data('id'));
        }, 350);
    });

    $("#filter_btn").click(function () {
        $("#relative_cntr").removeClass("hidden");
        $("#content").addClass("no_overflow");
    });

    $("#close_filter_btn").click(function () {
        $("#relative_cntr").addClass("hidden");
        $("#content").removeClass("no_overflow");
        searchUsers($('#search_field').val(), $('.selection_cell.selected').data('id'));
    });

    $('.selection_cell').on('click', function () {
        $('.selection_cell').removeClass('selected');
        $(this).addClass('selected');
        let personalityGroup = $(this).data('id');
        searchUsers($('#search_field').val(), personalityGroup);
    });

    function searchUsers(query, personalityGroup) {
        $.ajax({
            url: "{{ route('searchUsers') }}",
            method: "GET",
            data: {
                search: query,
                group_personality: personalityGroup || null
            },
            success: function (data) {
                if (data == "" && personalityGroup == null) { 
                    $("#result").html('<div id="result_msg"><span>Aucun résultat</span></div>');
                } else {
                    $('#result').html(data);
                }
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });
    }
});
</script>
<script>
   /* $(document).ready(function () {
    let timeout;
    $("#search_field").keyup(function () {
        clearTimeout(timeout);

        let query = $(this).val();
        let url = new URL(window.location.href);
        url.searchParams.set("query", query);
        window.history.replaceState({}, "", url);

        timeout = setTimeout(function () {
            goTo(1, true); 
        }, 350);
    });

    $("#filter_btn").click(function () {
        $("#relative_cntr").removeClass("hidden");
        $("#content").addClass("no_overflow");
    });

    $("#close_filter_btn").click(function () {
        $("#relative_cntr").addClass("hidden");
        $("#content").removeClass("no_overflow");

        goTo(1, true); 
    });
});

    $(document).ready(function () {
        $('.selection_cell').on('click', function () {
            $('.selection_cell').removeClass('selected');
            $(this).addClass('selected');
            let personalityGroup = $(this).data('id');
                        searchUsers($('#search_field').val(), personalityGroup);
        });

        $('#search_field').on('input', function () {
            searchUsers($(this).val(), $('.selection_cell.selected').data('id'));
        });

        function searchUsers(query, personalityGroup) {
            $.ajax({
                url: "{{ route('searchUsers') }}", 
                method: "GET",
                data: {
                    search: query,
                    'group-personality': personalityGroup
                },
                success: function (data) {
                    $('#result').html(data); 
                },
                error: function (xhr) {
                    console.error(xhr.responseText); 
                }
            });
        }
    });*/
</script>

@endsection