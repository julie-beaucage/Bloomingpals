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
        if (empty($request->answers) || !is_array($request->answers)) {
            $request->session()->flash('answers', $request->answers);
            return redirect()->back()->with('error', 'Veuillez répondre à toutes les questions.');
        }
        $request->session()->put('answers', $request->answers);
        $selectedAnswers = [];
        foreach ($request->answers as $questionId => $answerId) {
            $selectedAnswers[] = $answerId; 
        }

        $scores = $this->calculateScore($request->answers);
        $personalityType = $this->calculatePersonalityType($scores);
        $userId = auth()->id();

        try {
            DB::statement('CALL update_user_personality(?, ?)', [$userId, $personalityType]);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'appel à la procédure stockée : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour de votre personnalité.');
        }

        $personality = Personality::where('type', $personalityType)->first();
        if (!$personality) {
            return redirect()->back()->with('error', 'Type de personnalité non trouvé.');
        }
                $request->session()->forget('answers');

        return view('test_personality.resultat_test', compact('personality'));
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
