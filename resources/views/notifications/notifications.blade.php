@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
@endsection()

@csrf

@section('content')
<div class="container">
    @foreach ($notifications as $notification)
           <x-notification :notification="$notification"/>
    @endforeach
<div>

@endsection()

@section('script')
<script>
    $(document).ready(function(){

        window.setTimeout(function(){
            $.ajax({
                type: "GET",
                url: '/ReadAll',
                });
        }, 5 * 1000);
        
        $(".close_icon-page").on('click',function(){
            $.ajax({
                type: "Get",
                url: '/notifications/delete/'+$(this).attr('id'),
                });
                
            $(this).parent().find(":first").addClass('border-red');
            container=$(this).parent();

            window.setTimeout(function(){
                container.remove();
            },500);
            
        });


    });
</script>

@endsection()