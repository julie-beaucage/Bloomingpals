@extends("master")
@section('style')
  <link rel="stylesheet" href="{{ asset('css/personality.css') }}">
@endsection

@section("content")
    <span>
    <div class="test_container">
    <h3>Test de Personnalité</h3>
    <form id="personality-test-form" method="POST" action="{{ route('personality.submit') }}" onsubmit="return false;"> <!-- Empêcher l'envoi -->
        @csrf
        @foreach ($questions as $question)
        <fieldset>
                <legend>{{ $question->question }}</legend>
                    @foreach ($question->answers as $option)
                        <div>
                            <input type="radio" id="option-{{ $option->id }}" name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}">
                            <label for="option-{{ $option->id }}">{{ $option->answer }} (Score: {{ $option->type_answer }})</label>
                        </div>
                    @endforeach
            </fieldset>
        @endforeach

        <button type="button" class="sendTest">Envoyer</button> 
        <div id="error-message" style="color: red; display: none;"></div> 
    </form>
</div>
    </span>
@endsection

@section('script')
    <script src="{{ asset('/js/validationTestPersonality.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.sendTest').onclick = function() {
                if (typeof validateForm === 'function') {
                    var isValid = validateForm(); 
                    if (isValid) {
                        document.getElementById('personality-test-form').submit(); 
                    }
                } else {
                    console.error('validateForm is not defined');
                }
            };
        });
    </script>
@endsection
