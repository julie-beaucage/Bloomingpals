<div class="custom-overlay" id="overlayProfile" style="display: none;">
    <div class="container-custom-modal">
        <h3 class="titreModalprofile">Modifier votre profile :</h3>
        <button class="close" data-modal-id="overlayProfile">×</button>
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="firstname"
                    value="{{ Auth::user()->first_name }}">
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="lastname" value="{{ Auth::user()->last_name }}">
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <select class="form-select" id="genre" name="genre" required>
                    <option value="homme" {{ Auth::user()->gender == 'homme' ? 'selected' : '' }}>Homme</option>
                    <option value="femme" {{ Auth::user()->gender == 'femme' ? 'selected' : '' }}>Femme</option>
                    <option value="non-genre" {{ Auth::user()->gender == 'non-genre' ? 'selected' : '' }}>Non-genre
                    </option>
                </select>
            </div>

            <div class="mb-3 image-container">
                <label class="form-label">Image de profil</label>
                <input type="file" class="form-control" id="image_profile" name="image_profile" style="display: none;"
                    onchange="previewImage(event, 'imagePreview')">
                <div onclick="document.getElementById('image_profile').click()" class="image-clickable">
                    <img id="imagePreview" class="modifImage"
                        src="{{ Auth::user()->image_profil ? asset('storage/' . Auth::user()->image_profil) : asset('..\images\simple_flower.png') }}"
                        alt="Aperçu de l'image" />
                    <span class="overlay-text">Modifier image</span>
                </div>
            </div>

            <div class="mb-3 image-container">
                <label class="form-label">Image de fond</label>
                <input type="file" class="form-control" id="background_image" name="background_image"
                    style="display: none;" onchange="previewImage(event, 'backgroundPreview')">
                <div onclick="document.getElementById('background_image').click()" class="image-clickable">
                    <img id="backgroundPreview" class="modifImage"
                        src="{{ Auth::user()->background_image ? asset('storage/' . Auth::user()->background_image) : asset('..\images\R.jpg') }}"
                        alt="Aperçu de l'image" />
                    <span class="overlay-text">Modifier image</span>
                </div>
            </div>
            <div class="containerButtonsModal">
                <button type="submit" class="btnProfile">Enregistrer les modifications</button>
                <button type="button" class="interet-btn-annuler"
                    onclick="window.location.href='{{ route('profile', Auth::user()->id) }}'">Annuler</button>
            </div>
        </form>
    </div>
</div>