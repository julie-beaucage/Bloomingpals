@extends("master")
@section('style')
<link rel="stylesheet" href="{{ asset('css/personality.css') }}">
@endsection

@section("content")
<div class="eee">
    <div class="test_container">
        <h3>Test de Personnalité</h3>
        <form id="personality-test-form" method="POST" action="{{ route('personality.submit') }}"
            onsubmit="return false;"> 
            @csrf
            @foreach ($questions as $question)
                <fieldset class="questionContainer">
                    <legend>{{ $question->question }}</legend>
                    @foreach ($question->answers as $option)
                        <div class="containerAnswers">
                            <input type="radio" id="option-{{ $option->id }}" name="answers[{{ $question->id }}]"
                                value="{{ $option->id }}" @if (isset($answers[$question->id]) && $answers[$question->id] == $option->id) checked @endif
                                onchange="saveAnswer('{{ $question->id }}', '{{ $option->id }}')">
                            <label for="option-{{ $option->id }}">{{ $option->answer }}</label>
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
                <button type="submit" class="sendTest">Envoyer</button>
            @endif
            <div id="error-message" style="color: red; display: none;"></div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
function saveAnswer(questionId, answerId) {
    let answers = JSON.parse(localStorage.getItem('personalityAnswers')) || {};
    answers[questionId] = answerId;
    localStorage.setItem('personalityAnswers', JSON.stringify(answers));
    
    // Ajouter la classe selected-question au fieldset correspondant
    const questionFieldset = document.querySelector(`fieldset.questionContainer[data-question-id="${questionId}"]`);
    if (questionFieldset) {
        questionFieldset.classList.add('selected-question');
    }
}

function loadAnswers() {
    let answers = JSON.parse(localStorage.getItem('personalityAnswers')) || {};
    for (const [questionId, answerId] of Object.entries(answers)) {
        const radioButton = document.querySelector(`input[name="answers[${questionId}]"][value="${answerId}"]`);
        if (radioButton) {
            radioButton.checked = true;
            const questionFieldset = radioButton.closest('fieldset');
            questionFieldset.classList.add('selected-question');
        }
    }
}

document.addEventListener('DOMContentLoaded', loadAnswers);


    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.sendTest').onclick = function () {
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
<script src="{{ asset('/js/validationTestPersonality.js') }}"></script>
@endsection
