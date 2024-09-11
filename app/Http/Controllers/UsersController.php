<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function registerForm()
    {
        return view('users.register');
    }

    public function create(Request $request)
    {
        $formFields = $request->validate([
            'lastname' => ['required', 'min:3', 'max:20'],
            'firstname' => ['required', 'min:3', 'max:20'],
            'birthdate' => ['required', 'date', 'before:today'],
            'email' => ['required', 'email', 'max:100', Rule::unique('utilisateur', 'courriel')],
            'password' => ['required', 'confirmed', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/']
        ], [
            'password.regex' => "Le mot de passe doit respecter les critères suivants : <br>- Au moins un caractère spécial <br>- Au moins une majuscule <br>- Au moins une minucules <br>- Au moins un chiffre."
        ]);
        $formFields['password'] = bcrypt($formFields['password']);

         DB::statement("CALL creerUtilisateur('".$formFields['lastname']."', '".$formFields['firstname']."', '".$formFields['birthdate']."', '".$formFields['email']."', '".$formFields['password']."')");

        return redirect('/login')->with('message', 'Compte créer avec succès');
    }
    
    public function loginForm()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $data = array(
            "courriel" => $request['email'],
            "password" => $request['password']
        );
        if(auth()->attempt($data)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Bienvenue sur BloomingPals, '.auth()->user()->alias);
        }
        return back()->withErrors(['email'=>'Le courriel et le mot de passe ne correspondent pas'])->onlyInput('email');
    }

}
