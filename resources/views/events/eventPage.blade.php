@extends("master")

@section("style")
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
@endsection()

@section("content")
    <div>
        {{$event["id"]}}
        {{$event["nom"]}}
        {{$event["description"]}}
        {{$event["ville"]}}
        {{$event["adresse"]}}
        {{$event["date"]}}
        {{$event["prix"]}}
        {{$event["image"]}}
    </div>
@endsection()