@extends('master')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/meetupForm.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/cards.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/overlay-modal.css') }}">
@endsection()
@php
 use App\Models\Event;
 $event = Event::find($eventId); 
@endphp

@section('content')
<div class="containerMeetupForm">
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

    <form method="POST" action="{{ route('meetups.create') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_owner" value="{{ Auth::user()->id }}">
        <input type="hidden" name="event_id" value="{{ $eventId}}">

        <div class="form-group">
            <label for="name" class="form-label">Nom du Meetup</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="adress" class="form-label">Adresse</label>
            <input type="text" name="adress" id="adress" class="form-control" value="{{ old('adress', $event->adress) }}" required>
        </div>

        <div class="form-group">
            <label for="city" class="form-label">Ville</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $event->city) }}" required>
        </div>

        <div class="form-group">
            <label for="date" class="form-label">Date et Heure</label>
            <input type="datetime-local" name="date" id="date" class="form-control" value="{{ old('date', \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i')) }}" required>
        </div>

        <div class="form-group">
            <label for="nb_participant" class="form-label">Nombre de participants</label>
            <input type="number" name="nb_participant" id="nb_participant" class="form-control" min="2" value="{{ old('nb_participant', 2) }}" required>
        </div>

        <div class="form-group">
            <label for="image" class="form-label">Image du Meetup</label>
            <input type="file" class="form-control" id="image_meetup" name="image_meetup"
                style="display: none;" onchange="previewImage(event, 'backgroundPreview')">
            <div onclick="document.getElementById('image_meetup').click()" class="image-clickable">
                <img id="backgroundPreview" class="modifImage"
                    src="{{ $event->image ? $event->image : asset('..\images\R.jpg') }}"
                    alt="Aperçu de l'image" />
            </div>
        </div>
        <div class="form-group">
            <label for="searchInterests" class="form-label">Rechercher des intérêts</label>
            <input type="text" id="searchInterests" class="form-control" placeholder="Tapez pour rechercher des intérêts...">
            <div id="searchResults" class="search-result"></div>
        </div>

        <div class="form-group">
            <label for="interests" class="form-label">Intérêts sélectionnés</label>
            <div id="selectedInterests" class="tag-list">
            </div>
            <input type="hidden" name="interests" id="interests">
        </div>
        <div class="form-group form-check">            
            <input type="radio" name="public" value="1"><label>Public</label>
            <input type="radio" name="public" value="0"><label>Privé</label>
        </div>

        <button type="submit" class="btn btn-primary">Créer le Meetup</button>
    </form>
</div>
@endsection
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        setupTagSelection();
    });

    function setupTagSelection() {
        const tags = document.querySelectorAll('.interet-tag');

        tags.forEach(function (tag) {
            tag.addEventListener('click', function () {
                this.classList.toggle('interet-selected');
                updateSelectedInterets();
            });
        });
    }

    function updateSelectedInterets() {
        const selectedIds = Array.from(document.querySelectorAll('.interet-tag.interet-selected'))
                                 .map(tag => tag.getAttribute('data-id'));
        document.getElementById('interetSelectedInterets').value = selectedIds.join(',');
    }
</script>
<script>
    function previewImage(event, previewId) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    const allInterests = @json($allInterest);
    const searchInterestsInput = document.getElementById('searchInterests');
    const searchResultsDiv = document.getElementById('searchResults');
    const selectedInterestsDiv = document.getElementById('selectedInterests');
    const interestsInput = document.getElementById('interests');

    searchInterestsInput.addEventListener('input', function() {
        const query = searchInterestsInput.value.toLowerCase();
        searchResultsDiv.innerHTML = ''; 
        if (query) {
            const filteredInterests = allInterests.filter(interest =>
                interest.name.toLowerCase().includes(query)
            );
            filteredInterests.forEach(interest => {
                const resultDiv = document.createElement('div');
                resultDiv.textContent = interest.name;
                resultDiv.addEventListener('click', function() {
                    addInterest(interest);
                    searchResultsDiv.style.display = 'none';
                });
                searchResultsDiv.appendChild(resultDiv);
            });
            searchResultsDiv.style.display = 'block';
        } else {
            searchResultsDiv.style.display = 'none';
        }
    });

    function addInterest(interest) {
        const tagDiv = document.createElement('div');
        tagDiv.classList.add('tag');
        tagDiv.textContent = interest.name;
        tagDiv.addEventListener('click', function() {
            removeInterest(interest);
        });
        selectedInterestsDiv.appendChild(tagDiv);
        const selectedInterests = Array.from(selectedInterestsDiv.getElementsByClassName('tag')).map(tag => tag.textContent);
        interestsInput.value = selectedInterests.join(',');
    }

    function removeInterest(interest) {
        const tags = Array.from(selectedInterestsDiv.getElementsByClassName('tag'));
        const tagToRemove = tags.find(tag => tag.textContent === interest.name);
        if (tagToRemove) {
            selectedInterestsDiv.removeChild(tagToRemove);
        }
        const selectedInterests = Array.from(selectedInterestsDiv.getElementsByClassName('tag')).map(tag => tag.textContent);
        interestsInput.value = selectedInterests.join(',');
    }
</script>
<script>
    function previewImage(event, previewId) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(previewId).src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
<script>
    function checkPublicStatus(event) {
        event.preventDefault();

        var checkbox = document.getElementById('public');
                console.log('Public Checkbox is checked:', checkbox.checked);
                if (checkbox.checked) {
            console.log('Le meetup sera public.');
        } else {
            console.log('Le meetup sera privé.');
        }
        event.target.submit();
    }
</script>
@endsection