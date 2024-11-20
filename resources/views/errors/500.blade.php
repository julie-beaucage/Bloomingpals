@extends("master")

@section("content")
    <div class="flex-col align-center h-100">
        <br class="vmg-4em">
        <h1 class="neutral-900 fw-800 title-xl mg-0em">Erreur 500</h1>
        <p class="neutral-900 fw-800 text-lg mg-0em">Oops! Page not found</p>
        <p class="neutral-900 text-md mg-0em">Oups ! Une erreur s'est produite. Veuillez réessayer plus tard.</p>
        <a href="{{ url('/') }}">Retourner à l'accueil</a>
    </div>
@endsection()