@extends('master')

@section('style')
<link rel="stylesheet" href="{{ asset('css/notifications.css') }}">
@endsection()

@php
function truncate($str,$maxlength){
    if(strlen($str)>$maxlength){
        return substr($str,0,$maxlength-3).'...';
    }
    return $str;
    
}
@endphp
@section('content')

@endsection()

@section('script')
<script>
    $(document).ready(function () {

        window.setTimeout(function () {
            $.ajax({
                type: "GET",
                url: '/ReadAll',
            });
        }, 2 * 1000);
    });
</script>

@endsection()