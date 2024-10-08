<!doctype html>
<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "BloomingPals")</title>
    @include("bundles.stylesBundle")
    @yield("style", "")
</header>

<body>
    <div id="main">
        @if (isset($view))
            <x-navbar active="$view" />
        @else
            <x-navbar />
        @endif

        <div id="content">
            @yield("content", "")
            <x-footer />
        </div>
    </div>

    @include("bundles.scriptsBundle")
    @yield("script", "")
</body>

</html>