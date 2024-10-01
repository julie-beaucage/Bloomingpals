<!doctype html>
<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "BloomingPals")</title>
    @include("bundles.stylesBundle")
    @include("bundles.debuggingBundle")<!--This bundle is for devs-->
    @yield("style", "")
</header>
<body>
    <div id="main">
        @if (isset($view))
            <x-navbar active="$view"/>
        @else 
            <x-navbar/>
        @endif
        
        <div id="content">

            @if($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
            
            @yield("content", "")
            <x-footer/>
        </div>
    </div>
    @include("bundles.scriptsBundle")
    @yield("script", "")
</body>
</html>