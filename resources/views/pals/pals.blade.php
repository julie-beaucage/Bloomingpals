@extends('master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection

@section('content')
<div class="containerPals">
    @include('pals/searchModal')
    <h2>Les Pals </h2>
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
            <p id="selected-info"></p>
        </div>
        <div id="result" class="cards_list">
            @include('partial_views.user_cards')
        </div>
    </div>
</div>
@endSection

@section('script')

<script>
    function toggleCheckboxes(radio) {
    const checkboxContainer = radio.closest('.selection_cell').querySelector('.checkbox-container');

    if (radio.value === 'selection') {
        checkboxContainer.style.display = 'block';
    } else {
        checkboxContainer.style.display = 'none';
    }
}

$(document).ready(function () {
    const selectionCells = $('.selection_cell[data-id]');
    let groupStates = {}; 
    let selectedGroups = []; 
    let selectedPersonalities = []; 

    selectionCells.each(function () {
        const cell = $(this);
        const group = cell.data('id');
        cell.find('input[type="radio"][value="tous"]').attr('name', `selection_${group}`).prop('checked', true);
        cell.find('input[type="radio"][value="selection"]').attr('name', `selection_${group}`);
        groupStates[group] = true;

        selectedGroups.push(group); 
        cell.addClass('selected'); 
        updateCellSelection(cell, group);

        toggleCheckboxes(cell.find('input[type="radio"][value="tous"]')[0]);


        cell.on('click', function () {
            groupStates[group] = !groupStates[group]; 
            $(this).toggleClass('selected');
            if (groupStates[group]) {
                if (!selectedGroups.includes(group)) {
                    selectedGroups.push(group);
                }
            } else {
                cell.find('input[type="radio"]').hide();
                cell.find('label').hide(); 
                selectedGroups = selectedGroups.filter(g => g !== group);
                cell.find('input[type="checkbox"]').prop('checked', false).each(function() {
                    const personalityType = $(this).val();
                    selectedPersonalities = selectedPersonalities.filter(type => type !== personalityType);
                });
            }
           updateCellSelection(cell, group);
            updateSelectedInfo();
            handleSearch();
        });

        cell.find('input[type="radio"]').on('click', function (event) {
            event.stopPropagation(); 
            toggleCheckboxes(this);
        });

        cell.find('input[type="checkbox"]').on('click', function (event) {
            event.stopPropagation(); 
            handleCheckboxChange($(this), group);
            handleSearch();
        });
    });

    function updateCellSelection(cell, group) {
        const checkboxContainer = cell.find('.checkbox-container');
                if (groupStates[group]) {
            checkboxContainer.show();
        } else {
            checkboxContainer.hide();
        }
    }

    function handleCheckboxChange(checkbox, group) {
        const personalityType = checkbox.val();
        if (checkbox.is(':checked')) {
            if (!selectedPersonalities.includes(personalityType)) {
                selectedPersonalities.push(personalityType);
            }
        } else {
            selectedPersonalities = selectedPersonalities.filter(type => type !== personalityType);
        }

        if (selectedPersonalities.length > 0) {
            selectedGroups = selectedGroups.filter(g => g !== group);
        } else {
            if (!selectedGroups.includes(group)) {
                selectedGroups.push(group);
            }
        }
    }

    function handleSearch() {
        const query = $('#search_field').val();
        const personalityGroups = getSelectedGroups();
        console.log("Groupes sélectionnés finale:", personalityGroups);
        console.log("Personnalités sélectionnées finale:", selectedPersonalities);
        updateSelectedInfo();
        searchUsers(query, personalityGroups, selectedPersonalities);
    }
    function updateSelectedInfo() {
        $('#selected-info').html(`
            Groupes sélectionnés : ${selectedGroups.join(', ')}<br>
            Personnalités sélectionnées : ${selectedPersonalities.join(', ')}
        `);
    }
    function getSelectedGroups() {
        return selectedGroups.filter(group => 
            !selectedPersonalities.some(personality => personality.startsWith(group))
        );
    }

    let timeout;
    $("#search_field").on('keyup', function () {
        clearTimeout(timeout);
        const query = $(this).val();
        const url = new URL(window.location.href);
        url.searchParams.set("query", query);
        window.history.replaceState({}, "", url);

        timeout = setTimeout(function () {
            handleSearch();
        }, 350);
    });

    $("#filter_btn").on('click', function () {
        $("#relative_cntr").removeClass("hidden");
        $("#content").addClass("no_overflow");
        selectionCells.each(function () {
            const cell = $(this);
            const group = cell.data('id');
            updateCellSelection(cell, group);
        });
    });

    $("#close_filter_btn").on('click', function () {
        $("#relative_cntr").addClass("hidden");
        $("#content").removeClass("no_overflow");
        searchUsers($('#search_field').val(), selectedGroups, selectedPersonalities);
    });

    function searchUsers(query, personalityGroups, personalityTypes) {
        $.ajax({
            url: "{{ route('searchUsers') }}",
            method: "GET",
            data: {
                search: query,
                group_personality: personalityGroups.length > 0 ? personalityGroups : [],
                type_personality: personalityTypes.length > 0 ? personalityTypes : []
            },
            success: function (data) {
                if (!data || data === "") {
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











