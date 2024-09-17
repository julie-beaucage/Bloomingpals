@extends("master")

@section("style")
   <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection()

@section("content")

<div class="pageContainer">
    <header class="headerContainer">
        <div class="image_login">
            <img src="{{asset("../images/logoBloom.png")}}" alt="logo" class="imgLogo" />
        </div>
        <h1>BloomingPals</h1>
        <p>Une expérience d'amitiée nouvelle et captivante!</p>
    </header>

    <div class="formContainerLogin">
        <h2>Se connecter</h2>
        <hr>
        <form action="/login" method="POST">
            @csrf
            <div class="inputContainer">
                <div class="entryarea entryarealogin">
                    <input type="text" id="email"  placeholder="Adresse courriel" name="email" value="{{ old('email') }}" required/>
                </div>
            </div>
            <div class="inputContainer">
                <div class="entryarea entryarealogin">
                    <input type="password" id="password" placeholder="Mot de passe" class="alpha" name="password" value="{{ old('password') }}" required/>
                </div>
                <input type='hidden' class="errorMessage" name='error'></input>
                    @error('email')
                        <p class="errorMessage">{{ $message }}</p>
                    @enderror
            </div>
            <div class="formButton">
                <button type="submit" id="submitBtn" class="btn">Accéder</button>
            </div>
            <p>Vous n'avez pas de compte? <a href="/signIn"> Inscrivez-vous</a></p>
        </form>
    </div>
</div>
@endsection()

