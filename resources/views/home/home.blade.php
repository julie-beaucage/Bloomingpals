@extends("master")

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
@endsection()

@php
    $sections = [
        "Recommendations" => "/search/meetups",
        "Évenements populaires" => "/home/top_events",
        "Rencontres récentes" => "/home/recent_meetups",
        "Évenements à venir" => "/home/upcoming_events",
    ];
@endphp

@section("content")
    <div id="home_cntr">

        <div class="cards_scroller">
            <button type="button" class="btn-primary scroll_btn scroll_left hover_darker pointer">
                <span class="material-symbols-rounded">
                    arrow_back_ios_new
                </span>
            </button>
            <button type="button" class="btn-primary scroll_btn scroll_right hover_darker pointer">
                <span class="material-symbols-rounded">
                    arrow_forward_ios
                </span>
            </button>
            <div id="showcase" class="cards_row"></div>
        </div>

        @foreach($sections as $section => $url)
            <div class="section" id="{{ str_replace(" ", "_", $section) }}" style="display: none;">
                <h2>{{ $section }}</h2>
                <div class="cards_scroller">
                    <button type="button" class="btn-primary scroll_btn scroll_left hover_darker pointer">
                        <span class="material-symbols-rounded">
                            arrow_back_ios_new
                        </span>
                    </button>
                    <button type="button" class="btn-primary scroll_btn scroll_right hover_darker pointer">
                        <span class="material-symbols-rounded">
                            arrow_forward_ios
                        </span>
                    </button>
                    <div class="cards_row"></div>
                </div>
            </div>
        @endforeach
    </div>
@endsection()

@section('script')
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "search/events" /*"/home/showcase"*/,
                type: "GET",
                success: function(response){
                    $("#showcase").html(response);
                }
            });

            @foreach($sections as $section => $url)
                $.ajax({
                    url: "{{ $url }}",
                    type: "GET",
                    success: function(response){
                        if (response == "")
                            return;

                        $("#{{ str_replace(" ", "_", $section) }}").show();
                        $("#{{ str_replace(" ", "_", $section) }}").find(".cards_row").html(response);
                    }
                });
            @endforeach

            $(".cards_scroller").mouseenter(function(){
                let cards_row = $(this).find(".cards_row");

                if (cards_row[0].scrollWidth - cards_row.outerWidth() < 1)
                    $(this).find(".scroll_btn").hide();
                else
                    $(this).find(".scroll_btn").show();
                

                if (cards_row.scrollLeft() + cards_row.outerWidth() >= cards_row[0].scrollWidth - 1)
                    $(this).find(".scroll_right").hide();
                else if (cards_row.scrollLeft() == 0)
                    $(this).find(".scroll_left").hide();
                else {
                    $(this).find(".scroll_left").show();
                    $(this).find(".scroll_right").show();
                }
            });

            $(".scroll_btn").click(async function(){
                let cards_row = $(this).siblings(".cards_row");

                if (cards_row.children().length < 2)
                    return;

                let scroll = cards_row.scrollLeft();
                let card_width = cards_row.children().first().outerWidth(true);
                let scroll_width = cards_row[0].scrollWidth - cards_row.outerWidth();
                let gap = cards_row.children().eq(1).position().left - cards_row.children().first().position().left - card_width;

                if (scroll_width < 1)
                    return;
    
                let scroll_amount = card_width + gap;
                if (cards_row.attr('id') != "showcase")
                    scroll_amount *= 2;    

                if ($(this).hasClass("scroll_left"))
                    scroll -= scroll_amount;
                else if ($(this).hasClass("scroll_right"))
                    scroll += scroll_amount;

                if (scroll < 0)
                    scroll = 0;
                else if (scroll > scroll_width)
                    scroll = scroll_width;

                cards_row.finish();
                cards_row.animate({scrollLeft: scroll}, 250);

                if (scroll + cards_row.outerWidth() >= cards_row[0].scrollWidth - 1) {
                    $(this).parent().find(".scroll_right").hide();
                    $(this).parent().find(".scroll_left").show();
                }
                else if (scroll == 0) {
                    $(this).parent().find(".scroll_left").hide();
                    $(this).parent().find(".scroll_right").show();
                }
                else {
                    $(this).parent().find(".scroll_left").show();
                    $(this).parent().find(".scroll_right").show();
                }
            });
        });
    </script>
@endsection()