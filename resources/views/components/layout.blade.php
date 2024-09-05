<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cardo:wght@400;700&family=Eczar:wght@400..800&display=swap');
    </style>
    
    @props(['title', 'hasParallax','mainClass'])
    <title>BloomingPals {{ $title }}</title>
    @include('bundles.stylesBundle')
</head>
<body>
    <x-navbar/>
    <x-flash-message />
    @if(filter_var($hasParallax, FILTER_VALIDATE_BOOLEAN))
        <div class="parallax">
            <div class= "titleParallaxContainer">
                <p class="pageTitle">{{ $title }}</p>
                <div class="introInfo">
                    <img src="{{asset("../images/site/separateur.png")}}" alt="logo" class="imgSep" />
                </div>
            </div>
        </div>
    @endif
      <main class="main">
        {{ $slot }}
        </main>
    <x-footer/>
    @include('bundles.scriptsBundle')
    
</body>
<script defer>
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})
</script>
</html>