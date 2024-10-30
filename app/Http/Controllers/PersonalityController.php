<?php

namespace App\Http\Controllers;

use App\Models\PersonalityType;
use App\Models\PersonalityClass;
use App\Models\Question;
use App\Models\Question_answer;
use Illuminate\Http\Request;

class PersonalityController extends Controller
{

    public function startTest(Request $request)
    {
        $questions = Question::with('answers')->paginate(10);
        if ($questions->isEmpty()) {
            return redirect()->back()->with('error', 'Aucune question disponible pour le test.');
        }
        //$questions = Question::with('answers')->take(10)->get();
        return view('test_personality.questions_test', compact('questions'));
    }
    

    public function submitTest(Request $request)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|integer|exists:questions,id',
            'answers.*.answer' => 'required|string',
        ]);

        $scores = $this->calculateScore($validated['answers']);

        $personalityType = $this->calculatePersonalityType($scores);
        return response()->json(['personality_type' => $personalityType], 200);
    }

    private function calculateScore($answers)
    {
        $scores = [];

        foreach ($answers as $answer) {
            $score = $this->getScoreForAnswer($answer['answer']);
            $scores[$answer['question_id']] = $score;
        }

        return $scores;
    }

    private function getScoreForAnswer($answer)
    {

        switch ($answer) {
            case 'E':
                return ['E' => 1, 'I' => 0];
            case 'I':
                return ['I' => 1, 'E' => 0];

            default:
                return [];
        }
    }

    private function calculatePersonalityType($scores)
    {
        $type = '';
        $type .= $scores['E'] > $scores['I'] ? 'E' : 'I';
        $type .= $scores['S'] > $scores['N'] ? 'S' : 'N';
        $type .= $scores['T'] > $scores['F'] ? 'T' : 'F';
        $type .= $scores['J'] > $scores['P'] ? 'J' : 'P';

        return $type;
    }
}
