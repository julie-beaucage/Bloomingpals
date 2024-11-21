@extends('master')

@section('content')
<div class="container">
    <h1>Créer un Meetup</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('meetups.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_owner" value="{{ Auth::user()->id }}">
        <input type="hidden" name="event_id" value="{{ $event->id }}">

        <div class="mb-3">
            <label for="name" class="form-label">Nom du Meetup</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="adress" class="form-label">Adresse</label>
            <input type="text" name="adress" id="adress" class="form-control" value="{{ old('adress', $event->adress) }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Ville</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $event->city) }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date et Heure</label>
            <input type="datetime-local" name="date" id="date" class="form-control" value="{{ old('date', \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="mb-3">
            <label for="nb_participant" class="form-label">Nombre de participants</label>
            <input type="number" name="nb_participant" id="nb_participant" class="form-control" min="2" value="{{ old('nb_participant', 2) }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image du Meetup</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($event->image)
                <div class="mt-2">
                    <p>Image actuelle : </p>
                    <img src="{{ $event->image }}" alt="Image de l'évènement" class="img-thumbnail" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="public" id="public" class="form-check-input" {{ old('public', true) ? 'checked' : '' }}>
            <label for="public" class="form-check-label">Public</label>
        </div>

        <button type="submit" class="btn btn-primary">Créer le Meetup</button>
    </form>
</div>
@endsection
