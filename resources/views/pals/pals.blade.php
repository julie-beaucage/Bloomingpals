@extends('master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection

@section('content')
<h2>Les Pals </h2>
<div class="containerPals">
    @include('pals/searchModal')
    <div id="search_cntr">
        <div id="search_header">
            <div id="inputs_cntr">
                <input type="text" id="search_field" class="no_select" placeholder="Rechercher des amis">
                <button id="filter_btn" class="hover_darker no_select" type="button">
                    <span class="material-symbols-rounded">filter_vintage</span>
                </button>
            </div>
            <div id="selected_filters" class="selected-filters">
                <strong>Sélections :</strong>
                <span id="selected_groups"></span>
                <span id="selected_personalities"></span>
            </div>
        </div>
        <div id="result" class="cards_list">
            @include('partial_views.user_cards')
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectionCells = document.querySelectorAll('.selection_cell[data-id]');

    selectionCells.forEach(cell => {
        cell.addEventListener('click', function () {
            const group = this.getAttribute('data-id');
            const checkboxContainer = this.querySelector('.checkbox-container');
            if (checkboxContainer.style.display === 'block') {
                checkboxContainer.style.display = 'none';
            } else {
                checkboxContainer.style.display = 'block'; 
            }
        });
    });
    const checkboxes = document.querySelectorAll('.personality-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', function (event) {
            event.stopPropagation(); 
        });
    });

    $('.personality-checkbox').prop('checked', true);
    updateSelectedPersonalities();

    document.getElementById('close_filter_btn').addEventListener('click', function () {
        document.getElementById('relative_cntr').classList.add('hidden');
        const checkboxContainers = document.querySelectorAll('.checkbox-container');
        checkboxContainers.forEach(container => {
            container.style.display = 'none';
        });
    });
});


    $(document).ready(function () {
        let timeout;
        let selectedGroups = [];
        let selectedPersonalities = [];

        $("#search_field").keyup(function () {
            clearTimeout(timeout);
            let query = $(this).val();
            let url = new URL(window.location.href);
            url.searchParams.set("query", query);
            window.history.replaceState({}, "", url);

            timeout = setTimeout(function () {
                searchUsers(query, selectedGroups, selectedPersonalities);
            }, 350);
        });

        $("#filter_btn").click(function () {
            $("#relative_cntr").removeClass("hidden");
            $("#content").addClass("no_overflow");
        });

        $("#close_filter_btn").click(function () {
            $("#relative_cntr").addClass("hidden");
            $("#content").removeClass("no_overflow");
            searchUsers($('#search_field').val(), selectedGroups,selectedPersonalities );
        });

        $('.selection_cell').on('click', function () {
            $(this).toggleClass('selected');
            let personalityGroup = $(this).data('id');

            if ($(this).hasClass('selected')) {
                selectedGroups.push(personalityGroup);
            } else {
                selectedGroups = selectedGroups.filter(group => group !== personalityGroup);
            }

            searchUsers($('#search_field').val(), selectedGroups,selectedPersonalities);
        });

        $('.personality-checkbox').on('change', function () {
        let personalityType = $(this).val();

        if ($(this).is(':checked')) {
            selectedPersonalities.push(personalityType);
            console.log('Checked:', personalityType); 
        } else {
            selectedPersonalities = selectedPersonalities.filter(type => type !== personalityType);
        }
        console.log('Selected Groups:', selectedGroups);
        console.log('Selected Personalities:', selectedPersonalities);
        updateSelectedFilters();
        searchUsers($('#search_field').val(), selectedGroups, selectedPersonalities);
    });

    function updateSelectedFilters() {
    $('#selected_groups').empty(); 
    $('#selected_personalities').empty();
    
    $('.selection_cell.selected').each(function() {
        let groupId = $(this).data('id');
        let checkboxes = $(this).find('.personality-checkbox');
        let checkedCount = checkboxes.filter(':checked').length;
        if (checkedCount > 0) {
            if (checkedCount === checkboxes.length) {
                $('#selected_groups').append(`<div>${groupId}</div>`);
            } else {
                let checkedTypes = checkboxes.filter(':checked').map(function() {
                    return $(this).val();
                }).get();
                $('#selected_personalities').append(checkedTypes.join(', '));
            }
        }
    });

    if ($('#selected_personalities').is(':empty')) {
        $('#selected_personalities').text('Aucune personnalité sélectionnée');
    }
    }

        function searchUsers(query, personalityGroups,personalityTypes) {
            $.ajax({
                url: "{{ route('searchUsers') }}",
                method: "GET",
                data: {
                    search: query,
                    group_personality: personalityGroups.length > 0 ? personalityGroups : [],  
                    type_personality: personalityTypes.length > 0 ? personalityTypes : []
 
                },
                success: function (data) {
                    if (!data || data == "") {
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
@endsection