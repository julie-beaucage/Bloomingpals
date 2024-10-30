<div class="custom-overlay" id="overlayProfile" style="display: none;">
    <div class="container-custom-modal">
        <div class="header">
            <span class="title no_wrap">Modifier votre profile</span>
            <button class="close" onclick=closeModalProfile()>
                <span class="material-symbols-rounded" style="font-size: 24px; color: black;">close</span>
            </button>
        </div>

        <div class="body">
            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="field">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="text-input" id="prenom" name="firstname"
                        value="{{ Auth::user()->first_name }}">
                </div>

                <div class="field">
                    <label for="nom">Nom</label>
                    <input type="text" class="text-input" id="nom" name="lastname" value="{{ Auth::user()->last_name }}">
                </div>

                <div class="field">
                    <label for="genre">Genre</label>
                    <select class="select-input" id="genre" name="genre" required>
                        <option value="homme" {{ Auth::user()->gender == 'homme' ? 'selected' : '' }}>Homme</option>
                        <option value="femme" {{ Auth::user()->gender == 'femme' ? 'selected' : '' }}>Femme</option>
                        <option value="non-genre" {{ Auth::user()->gender == 'non-genre' ? 'selected' : '' }}>Autre
                        </option>
                    </select>
                </div>

                <div class="field image-container">
                    <label>Image de profil</label>
                    <input type="file" class="form-control" id="image_profile" name="image_profile" style="display: none;"
                        onchange="previewImage(event, 'imagePreview')">
                    <div onclick="document.getElementById('image_profile').click()" class="image-clickable">
                        <img id="imagePreview" class="modifImage"
                            src="{{ Auth::user()->image_profil ? asset('storage/' . Auth::user()->image_profil) : asset('..\images\simple_flower.png') }}"
                            alt="Aperçu de l'image" />
                    </div>
                </div>

                <div class="field image-container">
                    <label>Image de fond</label>
                    <input type="file" class="form-control" id="background_image" name="background_image"
                        style="display: none;" onchange="previewImage(event, 'backgroundPreview')">
                    <div onclick="document.getElementById('background_image').click()" class="image-clickable">
                        <img id="backgroundPreview" class="modifImage"
                            src="{{ Auth::user()->background_image ? asset('storage/' . Auth::user()->background_image) : asset('..\images\R.jpg') }}"
                            alt="Aperçu de l'image" />
                    </div>
                </div>
                <div class="containerButtonsModal">
                    <button type="submit" class="submit-btn">Enregistrer les modifications</button>
                </div>
            </form>
        </div>
    </div>
</div>