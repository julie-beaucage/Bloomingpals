@extends("master")

@section("content")
<link rel="stylesheet" href="{{ asset('./css/login.css') }}">
    <div class="formContainerLogin">
        <header>
            <h2>Se connecter</h2>
            <hr>
        </header>
        <form action="/login" method="POST">
            @csrf
            <div class="inputContainer">
                <div class="entryarea entryarealogin">
                    <input type="text" id="email"  placeholder="courriel" name="email" value="{{ old('email') }}" required/>
                </div>
            </div>
            <div class="inputContainer">
                <div class="entryarea entryarealogin">
                    <input type="password" id="password" class="alpha" name="password" value="{{ old('password') }}" required/>
                    <label for="password">Mot de passe</label>
                </div>
                <input type='hidden' class="errorMessage" name='error'></input>
                    @error('email')
                        <p class="errorMessage">{{ $message }}</p>
                    @enderror
            </div>
            <div class="formButton">
                <button type="submit" id="submitBtn" class="btn">Accéder</button>
            </div>
            <p>Vous n'avez pas de compte? <a href="/signIn">S'inscrire</a></p>
        </form>
    </div>
@endsection
