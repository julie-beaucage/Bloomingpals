@extends('master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/palCard.css') }}">
@endsection

@section('content')
<div class="containerPals">
    @include('pals/searchModal')
    <div id="search_cntr">
      <h2>Les Pals </h2>
        <div id="search_header">
            <div id="inputs_cntr">
                <input type="text" id="search_field" class="no_select" placeholder="Rechercher des pals">
                <button id="clear_btn" class="clear-btn" type="button" onclick="clearSearch()">×</button>
                <button id="filter_btn" class="hover_darker no_select" type="button">
                    <span class="material-symbols-rounded">page_info</span>
                </button>
            </div>
            <div id="selected-info"></div>
        </div>
        <div id="result" class="cards_list">
            @include('partial_views.pal_card')
        </div>
    </div>
</div>
@endSection

@section('script')

<script>
    
    document.getElementById('search_field').addEventListener('input', function () {
    document.getElementById('clear_btn').style.display = this.value ? 'inline' : 'none';
});

function clearSearch() {
    const searchField = document.getElementById('search_field');
    searchField.value = '';
    searchField.focus();
    document.getElementById('clear_btn').style.display = 'none';
}

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
    let allFilters = false;

    $("#reset_btn").on('click', function () {
        allFilters = true;
        const selectionCells = $('.selection_cell[data-id]');
        selectedGroups = []; 
        selectedPersonalities = []; 
        selectionCells.each(function () {
          const cell = $(this);
          const group = cell.data('id');
          groupStates[group] = true;
          selectedGroups.push(group); 
          cell.addClass('selected'); 
          cell.find('.containerRadioSelect').show();
          cell.find('input[type="radio"][value="tous"]').prop('checked', true);
          cell.find('.checkbox-container').hide(); 
          cell.find('input[type="checkbox"]').prop('checked', false); 
        });
        updateSelectedInfo();
        fetchUsers(allFilters);
        allFilters = false;
    });

    selectionCells.each(function () {
        const cell = $(this);
        const group = cell.data('id');
        cell.find('input[type="radio"][value="tous"]').attr('name', `selection_${group}`).prop('checked', true);
        cell.find('input[type="radio"][value="selection"]').attr('name', `selection_${group}`);
        groupStates[group] = true;

        selectedGroups.push(group); 
        cell.addClass('selected'); 
        toggleCheckboxes(cell.find('input[type="radio"][value="tous"]')[0]);

        cell.on('click', function () {
            if ($(event.target).closest('.checkbox-container, .containerRadioSelect').length > 0) {
                return;
            }
            groupStates[group] = !groupStates[group]; 
            $(this).toggleClass('selected');
            cell.find('input[type="radio"][value="tous"]').prop('checked', true).trigger('change');
            toggleCheckboxes(cell.find('input[type="radio"][value="tous"]')[0]);
            cell.find('.containerRadioSelect').show();
            if (groupStates[group]) {
                if (!selectedGroups.includes(group)) {
                    selectedGroups.push(group);
                }
            } else {
                cell.find('.containerRadioSelect').hide();
                selectedGroups = selectedGroups.filter(g => g !== group);
                cell.find('input[type="checkbox"]').prop('checked', false).each(function() {
                    const personalityType = $(this).val();
                    selectedPersonalities = selectedPersonalities.filter(type => type !== personalityType);
    
                });
            }
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
      const groupsHtml = selectedGroups.map(group => `<div class="tag_recherche">${group}</div>`).join('');
      const personalitiesHtml = selectedPersonalities.map(personality => `<div class="tag_recherche">${personality}</div>`).join('');
      $('#selected-info').html(`
         <div class="selected-personality">${groupsHtml} ${personalitiesHtml}</div>
      `);
      if(allFilters){
        $('#selected-info').html(`
         <div class="tag_recherche">Tous</div>
      `);
      }
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
    });

    $("#close_filter_btn").on('click', function () {
        $("#relative_cntr").addClass("hidden");
        $("#content").removeClass("no_overflow");
        searchUsers($('#search_field').val(), selectedGroups, selectedPersonalities);
    });

    $("#close_filter_btn_just").on('click', function () {
        $("#relative_cntr").addClass("hidden");
        $("#content").removeClass("no_overflow");
    });


    function searchUsers(query, personalityGroups, personalityTypes) {
        $.ajax({
            url: "{{ route('searchPals') }}",
            method: "GET",
            data: {
                search: query,
                group_personality: personalityGroups.length > 0 ? personalityGroups : [],
                type_personality: personalityTypes.length > 0 ? personalityTypes : []            },
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
    function fetchUsers(allFilters) {
    $.ajax({
        url: "{{ route('searchPals') }}",  
        method: 'GET',
        data: {
            allFilters: allFilters,
        },
        success: function(data) {
            $('#result').html(data);
        }
    });
}
});
</script>
@endsection











