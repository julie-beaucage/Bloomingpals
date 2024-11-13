<div class="custom-overlay" id="loginOverlay" style="display: none;">
    <div class="container-custom-modal">
        <div class="header">
            <span class="title no_wrap"> </span>
            <button class="close" onclick="closeOverlay()">
                <span class="material-symbols-rounded" style="font-size: 24px; color: black;">close</span>
            </button>
        </div>
        <div class="formContainerLogin">
            <header>
                <h2>Créer un compte </h2>
                <hr>
            </header>
            <form action="/signIn" method="POST" id="signupForm">
                @csrf
                <div class="inputContainer">
                    <div class="entryarea entryarealogin">
                        <input type="text" class="inputSignup" id="prenom" placeholder="Prénom" name="firstname"
                            value="{{ old('firstname') }}" required />
                    </div>
                    @error('firstname')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputContainer">
                    <div class="entryarea entryarealogin">
                        <input type="text" class="inputSignup" id="nom" placeholder="Nom" name="lastname"
                            value="{{ old('lastname') }}" required />
                    </div>
                    @error('lastname')
                        <div class="error-message">{!! htmlspecialchars($message) !!}</div>
                    @enderror
                </div>
                <div class="inputContainer">
                    <div class="entryarea entryarealogin">
                        <input type="email" class="inputSignup" id="email" placeholder="Courriel" name="email"
                            value="{{ old('email') }}" required autocomplete="email" />
                    </div>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputContainer">
                    <div class="entryarea entryarealogin">
                        <input type="date" class="inputSignup" id="date_naissance" placeholder="Date de naissance"
                            name="birthdate" value="{{ old('birthdate') }}" required />
                    </div>
                    @error('birthdate')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="inputContainer">
                    <div class="entryarea entryarealogin">
                        <select class="inputSignup" id="genre" name="genre" required>
                            <option value="" disabled {{ old('genre') ? '' : 'selected' }}>Sélectionner un genre
                            </option>
                            <option value="homme" {{ old('genre') == 'homme' ? 'selected' : '' }}>Homme</option>
                            <option value="femme" {{ old('genre') == 'femme' ? 'selected' : '' }}>Femme</option>
                            <option value="non-genre" {{ old('genre') == 'non-genre' ? 'selected' : '' }}>Non-genre
                            </option>
                        </select>
                    </div>
                    @error('genre')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="inputContainer">
                    <div class="entryarea entryarealogin">
                        <input type="password" class="inputSignup" id="password" placeholder="Mot de passe"
                            name="password" value="{{ old('password') }}" autocomplete="new-password" required />
                        <span id="togglePassword" class="togglePassword" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="error-message">{!! $message !!}</div>
                    @enderror
                </div>
                <div class="inputContainer">
                    <div class="entryarea entryarealogin">
                        <input type="password" class="inputSignup" id="password_confirmation"
                            placeholder="Confirmer le mot de passe" name="password_confirmation"
                            autocomplete="new-password" required />
                        <span id="togglePasswordConfirmation" class="togglePassword"
                            onclick="togglePasswordConfirmationVisibility()">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="formButton">
                    <button type="submit" id="submitBtn" class="btn">Créer le compte</button>
                </div>
                <p>Vous avez déjà un compte? <a href="/login" class="link">Se connecter</a></p>
            </form>
        </div>
    </div>
</div>
</div>