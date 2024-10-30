@extends("master")
@section('style')
  <link rel="stylesheet" href="{{ asset('css/test_perso.css') }}">
@endsection()
@section("content")
    <span>
    <div class="test_container">
    <h3>Test de Personnalité</h3>
    <form id="personality-test-form" method="POST" action="{{ route('personality.submit') }}">
        @csrf
        @foreach ($questions as $question)
        <fieldset>
                <legend>{{ $question->question }}</legend>
                    @foreach ($question->answerOptions as $option)
                        <div>
                            <input type="radio" id="option-{{ $option->id }}" name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            <label for="option-{{ $option->id }}">{{ $option->answer }} (Score: {{ $option->score }})</label>
                        </div>
                    @endforeach

            </fieldset>
        @endforeach
        <div class="pagination">
            @if ($questions->currentPage() > 1)
                <a href="{{ $questions->previousPageUrl() }}" class="prev">← Précédent</a>
            @endif

            @if ($questions->hasMorePages())
                <a href="{{ $questions->nextPageUrl() }}" class="next">Suivant →</a>
            @endif
        </div>
        @if (!$questions->hasMorePages())
                <button type="submit" class="sendTest">Submit</button>
            @endif
    </form>
</div>
    </span>
@endsection()