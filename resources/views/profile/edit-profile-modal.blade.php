
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier le profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="firstname" value="{{ Auth::user()->prenom }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="lastname" value="{{ Auth::user()->nom }}">
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select" id="genre" name="genre" required>
                            <option value="homme" {{ Auth::user()->genre == 'homme' ? 'selected' : '' }}>Homme</option>
                            <option value="femme" {{ Auth::user()->genre == 'femme' ? 'selected' : '' }}>Femme</option>
                            <option value="non-genre" {{ Auth::user()->genre == 'non-genre' ? 'selected' : '' }}>Non-genre</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="image_profil" class="form-label">Image de profil</label>
                        <input type="file" class="form-control" id="image_profil" name="image_profil">
                        <img class="modifImage" src="{{Auth::user()->image_profil ? 
                        asset('storage/' . Auth::user()->image_profil) : asset('..\images\flower.png')}}" alt="" />
                    </div>

                    <div class="mb-3">
                        <label for="background_image" class="form-label">Image de fond</label>
                        <input type="file" class="form-control" id="background_image" name="background_image">
                        <img class="modifImage" src="{{Auth::user()->background_image ? 
                        asset('storage/' . Auth::user()->background_image) : asset('..\images\flower.png')}}" alt="" />
                    </div>
                    <button type="submit" class="btn btn-primary">Enregistrer les modificationsss</button>
                </form>
            </div>
        </div>
    </div>
</div>
