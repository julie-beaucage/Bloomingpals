@extends('master')
@section('style')
  <link rel="stylesheet" href="{{ asset('css/personality.css') }}">
@endsection()
@php
    $userPersonality = Auth::user()->getPersonalityGroup();
@endphp
@section('content')
<div  class="personality result_test {{ $userPersonality }}">
    <h1>Félicitation! Vous avez complété le test:</h1>
    <p class="test2">Votre type de personnalité est : <strong>{{ $personality->type  }}</strong></p>
    <p><strong>{{ $personality->name }}</strong></p>

    <h2>Description:</h2>
    <p>{{ $personality->nameDescription }}</p>

    <a href="{{ route('profile', ['id' => Auth::user()->id]) }}">Retour à votre profil</a>
</div>
@endsection
