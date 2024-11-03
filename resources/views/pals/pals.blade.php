@extends('master')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection

@section('content')
<h2>Les Pals </h2>
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
        $('#search_field').on('input', function () {
            let query = $(this).val();
            $.ajax({
                url: "{{ route('searchUsers') }}", 
                method: "GET",
                data: {
                    search: query
                },
                success: function (data) {
                    $('#result').html(data); 
                },
                error: function (xhr) {
                    console.error(xhr.responseText); 
                }
            });
        });
    });
</script>

@endsection