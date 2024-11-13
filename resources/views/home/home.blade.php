@extends("master")

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/overlay-modal.css') }}">


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
    <div class="main-carousel">
        <div class="carousel-wrapper" id="carousel-wrapper">
            <div class="carousel-card card-1">
                <div class="carousel-text">
                    <h2>Blooming Pals: Une expérience magique pour créer de nouveaux lieux</h2>
                </div>
                <div class="image_login">
                    <img src="{{asset("../images/logoBloom.png")}}" alt="logo" class="imgLogo" />
                </div>
            </div>
            <div class="carousel-card card-2">
                <div class="carousel-text">
                    <h2>Faites des liens avec des gens semblables à vous</h2>
                </div>
            </div>
            <div class="carousel-card card-3">
                <div class="carousel-text">
                    <h2>Restez en contact avec les événements actuels au Québec</h2>
                </div>
            </div>
            <div class="carousel-card card-4">
                <div class="carousel-text">
                    <h2>Clavardez avec vos nouveaux pals pour une amitié plus profonde</h2>
                </div>
            </div>
        </div>
    </div>
    @include ('auth/login')
    @guest
        <div>
            <a class="rejoindre_btn" id="openLoginInOverlay" title="Rejoindre BloomingPals">
                Rejoindre BloomingPals
            </a>
        </div>
    @endguest
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
    function openOverlay() {
        document.getElementById("loginOverlay").style.display = "flex";
    }

    function closeOverlay() {
        document.getElementById("loginOverlay").style.display = "none";
    }
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
    document.addEventListener("DOMContentLoaded", function () {
        const joinButton = document.querySelector(".rejoindre_btn");
        if (joinButton) {
            joinButton.addEventListener("click", openOverlay);
        }
    });

</script>
<script>
    $(document).ready(function () {
        let currentIndex = 0;
        const totalCards = $(".carousel-card").length;

        function moveCarousel() {
            const wrapper = $("#carousel-wrapper");
            currentIndex = (currentIndex + 1) % totalCards;
            const offset = -currentIndex * 100;
            wrapper.css("transform", `translateX(${offset}%)`);
        }

        setInterval(moveCarousel, 3000);

        $.ajax({
            url: "search/events" /*"/home/showcase"*/,
            type: "GET",
            success: function (response) {
                $("#showcase").html(response);
            }
        });

        @foreach($sections as $section => $url)
            $.ajax({
                url: "{{ $url }}",
                type: "GET",
                success: function (response) {
                    if (response == "")
                        return;

                    $("#{{ str_replace(" ", "_", $section) }}").show();
                    $("#{{ str_replace(" ", "_", $section) }}").find(".cards_row").html(response);
                }
            });
        @endforeach

        $(".cards_scroller").mouseenter(function () {
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

        $(".scroll_btn").click(async function () {
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
            cards_row.animate({ scrollLeft: scroll }, 250);

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