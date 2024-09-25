<!doctype html>
<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "BloomingPals")</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @include("bundles.stylesBundle")
    @include("bundles.debuggingBundle")<!--This bundle is for devs-->
    @yield("style", "")
</header>
<body>
    <div id="main">
        <x-navbar/>
        
        <div id="content">
            @yield("content", "")
            <x-footer/>
        </div>
    </div>
    @include("bundles.scriptsBundle")
    @yield("script", "")
</body>
</html>