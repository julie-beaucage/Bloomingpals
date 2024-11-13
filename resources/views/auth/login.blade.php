<div class="custom-overlay" id="loginOverlay" style="display: none;">
    <div class="container-custom-modal">
    <div class="header">
            <span class="title no_wrap"> </span>
            <button class="close" onclick="closeOverlay()">
                <span class="material-symbols-rounded" style="font-size: 24px; color: black;">close</span>
            </button>
        </div>
        <div class="pageContainerLogin">
            <div class="img_login_left">
               <div class="image_login">
                    <img src="{{ asset('images/logoBloom.png') }}" alt="logo" class="imgLogo" />
                </div>
                <h1>BloomingPals</h1>
                <p>Une expérience d'amitié nouvelle et captivante !</p>
            </div>

            <div class="formContainerLogin">
                <h2>Se connecter</h2>
                <hr>
                <form action="/login" method="POST">
                    @csrf
                    <div class="inputContainer">
                        <div class="entryarea entryarealogin">
                            <input type="text" class="inputSignup" id="email" placeholder="Adresse courriel" name="email" value="{{ old('email') }}" required />
                        </div>
                    </div>
                    <div class="inputContainer">
                        <div class="entryarea entryarealogin">
                            <input type="password" class="inputSignup" id="password" placeholder="Mot de passe" name="password" value="{{ old('password') }}" required />
                            <span id="togglePassword" class="togglePassword" onclick="togglePasswordVisibility()">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        @error('email')
                            <p class="errorMessage">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="formButton">
                        <button type="submit" id="submitBtn" class="btn">Accéder</button>
                    </div>
                    <p>Vous n'avez pas de compte ? <a href="./signIn" class="link">Inscrivez-vous</a></p>
                </form>
            </div>
        </div>
    </div>
</div>