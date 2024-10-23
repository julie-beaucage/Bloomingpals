@extends('master')
@section('style')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection()
@section('title', 'Test Results')

@php
    $userPersonality = Auth::user()->getPersonalityType();
@endphp
@section('content')
<div class="personality {{ $userPersonality  }}>
    <h1>Félicitation vous avez complété le test: Résultat</h1>
    <p>Votre type de personnalité est : <strong>{{ $personality->type  }}</strong></p>
    <p><strong>{{ $personality->name }}</strong></p>

    <h2>Type Description</h2>
    <p>{{ $personality->nameDescription }}</p>

    <a href="{{ route('personality.test') }}">Retake the test</a>
</div>
@endsection
