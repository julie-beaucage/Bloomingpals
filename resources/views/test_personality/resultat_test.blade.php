@extends('master')
@section('style')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection()

@php
    $userPersonality = Auth::user()->getPersonalityType();
@endphp
@section('content')
<div style="width: 100%; height: 100%; background-color: var(--white); display: flex; justify-content: center;">
  <div class="personality {{ $userPersonality  }}">
      <h1>Félicitation vous avez complété le test: Résultat</h1>
      <p class="test2">Votre type de personnalité est : <strong>{{ $personality->type  }}</strong></p>
      <p><strong>{{ $personality->name }}</strong></p>

      <h2>Type Description</h2>
      <p>{{ $personality->nameDescription }}</p>

      <a href="{{ route('personality.test') }}">Retake the test</a>
  </div>
</div>
@endsection
