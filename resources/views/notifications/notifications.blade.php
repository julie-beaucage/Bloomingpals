@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
@endsection()


@section('content')

@if($notifications->first() == null)
        <div style="margin-top:30%; font-size:1.5em;"><strong>Aucune notifications</strong></div>
@else
<div class="container">
    
    @foreach ($notifications as $notification)
        <x-notification :notification="$notification" />
    @endforeach
</div>
@endif

@endsection()

@section('script')
<script>
    $(document).ready(function () {

        window.setTimeout(function () {
            $.ajax({
                type: "GET",
                url: '/ReadAll',
            });
        }, 5 * 1000);

        $('.notification-container-page').on('click', function (event) {
            window.location.href = $(this).attr('linking');
        });

        $(".close_icon-page").on('click', function () {
            $.ajax({
                type: "Get",
                url: '/notifications/delete/' + $(this).attr('id'),
            });

            $(this).parent().find(":first").addClass('border-red');
            container = $(this).parent();

            window.setTimeout(function () {
                container.remove();
            }, 500);

        });


    });
</script>

@endsection()