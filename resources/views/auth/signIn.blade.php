@extends("master")

@section("style")
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection()

@section("content")
    <div class="formContainerLogin">
        <header>
            <h2>Créer un compte </h2>
            <hr>
        </header>
        <form action="/signIn" method="POST">
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
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputContainer">
                <div class="entryarea entryarealogin">
                    <input type="email" class="inputSignup" id="email" placeholder="Courriel" name="email"
                        value="{{ old('email') }}" required />
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
                        <option value="" disabled {{ old('genre') ? '' : 'selected' }}>Sélectionner un genre</option>
                        <option value="homme" {{ old('genre') == 'homme' ? 'selected' : '' }}>Homme</option>
                        <option value="femme" {{ old('genre') == 'femme' ? 'selected' : '' }}>Femme</option>
                        <option value="non-genre" {{ old('genre') == 'non-genre' ? 'selected' : '' }}>Non-genre</option>
                    </select>
                </div>
                @error('genre') 
                    <div class="error-message">{{ $message }}</div>
                @enderror 
            </div>

            <div class="inputContainer">
                <div class="entryarea entryarealogin">
                    <input type="password" class="inputSignup" id="password" placeholder="Mot de passe" name="password"
                        value="{{ old('password') }}" required />
                </div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="inputContainer">
                <div class="entryarea entryarealogin">
                    <input type="password" class="inputSignup" id="password_confirmation"
                        placeholder="Confirmer le mot de passe" name="password_confirmation" required />
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

@endsection()