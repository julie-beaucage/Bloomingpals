<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "BloomingPals")</title>
    @include("bundles.stylesBundle")
    @yield("style", "")
</head>

<body>

    <div id="main">
   
    
        @if (isset($view))
            <x-navbar active="$view" />
        @else
            <x-navbar />
        @endif

        <div id="content">
        <x-header/>
            
            @yield("content", "")
            <x-footer />
        </div>
    </div>

    @include("bundles.scriptsBundle")
    @yield("script", "")
</body>

</html>