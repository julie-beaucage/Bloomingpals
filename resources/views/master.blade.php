<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield("title", "BloomingPals")</title>
    @include("bundles.stylesBundle")
    @yield("style", "")
</head>
@php use \App\Http\Controllers\NotificationController;
   $notifications=NotificationController::index();
@endphp
<body>
    <div id="main">
    <x-header />
        @if (isset($view))
            <x-navbar active="$view" />
        @else
            <x-navbar />
        @endif
        <div id="content">
            <x-notifications :notifications="$notifications" />
            @yield("content", "")
            <x-footer />
        </div>
    </div>
    @include("bundles.scriptsBundle")
    @yield("script", "")
</body>
</html>