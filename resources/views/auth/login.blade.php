<div class="formContainerLogin" id="loginForm">
    <h2>Se connecter</h2>
    <hr>
    <form action="/login" method="POST">
        @csrf
        <div class="inputContainer">
            <div class="entryarea entryarealogin">
                <input type="text" class="inputSignup" id="emailLogin" placeholder="Adresse courriel" name="email" autocomplete="email"
                    value="{{ old('email') }}" required />
            </div>

        </div>
        <div class="inputContainer">
            <div class="entryarea entryarealogin">
                <input type="password" class="inputSignup" id="passwordLogin" placeholder="Mot de passe" name="password" autocomplete="current-password"
                    required />
                <span id="togglePassword" class="togglePassword" onclick="togglePasswordVisibilityLogin()">
                    <span id="icone_login" class="material-symbols-rounded">visibility</span>
                </span>
            </div>
            @error('email')
                <p class="errorMessage">{{ $message }}</p>
            @enderror
        </div>
        <div class="formButton">
            <button type="submit" id="submitBtnLogin" class="btn">Accéder</button>
        </div>
        <p>Vous n'avez pas de compte ? <a href="javascript:void(0);" class="link"
                onclick="showSignUp()">Inscrivez-vous</a></p>
    </form>
</div>