<?php

namespace App\Http\Controllers;

use App\Models\Type_personality;
use App\Models\Personality;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class PersonalityController extends Controller
{

    public function startTest(Request $request)
    {
       /* $questions = Question::with('answerOptions')->paginate(10);
        if ($questions->isEmpty()) {
            return redirect()->back()->with('error', 'Aucune question disponible pour le test.');
        }
        return view('test_personality.questions_test', compact('questions'));*/
        $questions = Question::with('answers')->take(10)->get();

        // Vérifie s'il y a des questions disponibles
        if ($questions->isEmpty()) {
            return redirect()->back()->with('error', 'Aucune question disponible pour le test.');
        }
    
        // Retourne la vue avec les questions
        return view('test_personality.questions_test', compact('questions'));
    }
    

    public function submitTest(Request $request)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer|exists:questions,id',
            'answers.*.answer' => 'required|string|in:E,I,S,N,T,F,P,J',
        ]);

        $scores = $this->calculateScore($validated['answers']);

        $personalityType = $this->calculatePersonalityType($scores);
        return view('test_personality.resultat_test', compact('personalityType'));
    }

    private function calculateScore($answers)
    {
        $scores = [
            'E' => 0, 'I' => 0,
            'S' => 0, 'N' => 0,
            'T' => 0, 'F' => 0,
            'P' => 0, 'J' => 0,
        ];
    
        foreach ($answers as $answerData) {
            $answer = Answer::find($answerData['answer_id']); 
            if ($answer && isset($scores[$answer->type_answer])) {
                $scores[$answer->type_answer]++;
            }
        }

        return $scores;
    }

    private function calculatePersonalityType($scores)
    {
        $type = '';
        $type .= $scores['E'] > $scores['I'] ? 'E' : 'I';
        $type .= $scores['S'] > $scores['N'] ? 'S' : 'N';
        $type .= $scores['T'] > $scores['F'] ? 'T' : 'F';
        $type .= $scores['J'] > $scores['P'] ? 'J' : 'P';

        $personality = Personality::where('type', $type)->first();

        return $personality ? $personality->name : $type;
    }
}
