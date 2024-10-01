
@extends("master")

@section("content")
    <div class="container">
        <h1>Compte créé avec succès !</h1>
        <p>Un courriel de confirmation vous sera envoyé sous peu. Veuillez vérifier votre boîte de réception.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Retourner à la page de connexion</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection()