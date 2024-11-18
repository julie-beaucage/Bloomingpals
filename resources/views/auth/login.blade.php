<div class="formContainerLogin" id="loginForm">
    <h2>Se connecter</h2>
    <hr>
    <form action="/login" method="POST">
        @csrf
        <div class="inputContainer">
            <div class="entryarea entryarealogin">
                <input type="text" class="inputSignup" id="emailLogin" placeholder="Adresse courriel" name="emailLogin" autocomplete="email"
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
            @error('emailLogin')
                <p class="errorMessage">{{ $message }}</p>
            @enderror
        </div>
        @if(session('error'))
        <div class="flash-error" style="color: red; padding: 10px;">
            {{ session('error') }}
        </div>
    @endif
        <div class="formButton">
            <button type="submit" id="submitBtnLogin" class="btn">Accéder</button>
        </div>
        <p>Vous n'avez pas de compte ? <a href="javascript:void(0);" class="link"
                onclick="showSignUp()">Inscrivez-vous</a></p>
    </form>
</div>