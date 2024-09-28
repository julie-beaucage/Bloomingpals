<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\utilisateur;

class CustomVerificationController extends Controller
{

    public function verify(Request $request, $id, $hash)
    {
        $user = utilisateur::find($id);

        if (! $user || ! hash_equals($hash, sha1($user->getEmailForVerification()))) {
            Log::error('Échec de la vérification pour l\'utilisateur ID : ' . $id . ' avec hash : ' . $hash);
            return redirect('/login')->withErrors(['message' => 'Échec de la vérification']);
        }

        if ($user->hasVerifiedEmail()) {
            Log::info('L\'utilisateur a déjà vérifié son email : ' . $user->email);
            return redirect('/login')->with('status', 'Votre email a déjà été vérifié.');
        }

        $user->markEmailAsVerified();
        Log::info('Email vérifié avec succès pour l\'utilisateur ID : ' . $id, [
            'email_verified_at' => $user->email_verified_at
        ]);
        
        event(new Verified($user));

        return redirect('/login')->with('status', 'Votre email a été vérifié.');
    }
}
