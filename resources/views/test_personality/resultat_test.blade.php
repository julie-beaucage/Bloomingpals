@extends('master')

@section('title', 'Test Results')

@section('content')
    <h1>Félicitation vous avez complété le test: Résultat</h1>
    <p>Votre type de personnalité est : <strong>{{ $personality->type  }}</strong></p>
    <p><strong>{{ $personality->name }}</strong></p>

    <h2>Type Description</h2>
    <p>{{ $personality->nameDescription }}</p>

    <a href="{{ route('personality.test') }}">Retake the test</a>
@endsection
