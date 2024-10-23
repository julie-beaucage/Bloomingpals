<?php

namespace App\Http\Controllers;

use App\Models\Type_personality;
use App\Models\Personality;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonalityController extends Controller
{
    public function personnalite($id) {
        $user = User::findOrFail($id);
        $personality = $user->getUserPersonality($id);
        Log::info('Personnalité de l\'utilisateur : ', (array) $personality);

        return view('profile.personnalite', compact('user', 'personality'));
    }

    public function startTest(Request $request)
    {
        Log::info('Début du test de personnalité.');
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
        Log::info('Soumission du test de personnalité.');
        if (empty($request->answers) || !is_array($request->answers)) {
            Log::error('Aucune réponse soumise ou format incorrect.');
            return redirect()->back()->with('error', 'Veuillez répondre à toutes les questions.');
        }
        $selectedAnswers = [];
        foreach ($request->answers as $questionId => $answerId) {
            $selectedAnswers[] = $answerId; // Récupère l'ID de la réponse
        }

        Log::info('ID des réponses sélectionnées : ', $selectedAnswers);
        $scores = $this->calculateScore($request->answers);
        Log::info('Scores calculés : ', $scores);


        $personalityType = $this->calculatePersonalityType($scores);
        Log::info('Type de personnalité calculé : ' . $personalityType);
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
    
        return view('test_personality.resultat_test', compact('personality'));
    }

    private function calculateScore($answers)
    {
        $scores = [
            'E' => 0, 'I' => 0,
            'S' => 0, 'N' => 0,
            'T' => 0, 'F' => 0,
            'P' => 0, 'J' => 0,
        ];
    
        foreach ($answers as $answerId) { 
            $answer = Answer::find($answerId); 
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

        return $personality ? $personality->type : $type;
    }
}
