@extends('master')

@section('title', 'Test Results')

@section('content')
    <h1>Your Personality Type</h1>
    <p>Your personality type is: <strong>{{ $personality_type }}</strong></p>

    <h2>Type Description</h2>
    <p>{{ $type_description }}</p>

    <a href="{{ route('personality.test') }}">Retake the test</a>
@endsection
