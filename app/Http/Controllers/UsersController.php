<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class usersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function registerForm()
    {
        return view('login.signIn');
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
            'password.regex' => "Le mot de passe doit respecter les critères suivants : <br>- Au moins un caractère spécial <br>- Au moins une majuscule <br>- Au moins une minuscule <br>- Au moins un chiffre."
        ]);
    
        $password = bcrypt($formFields['password']);
    
        try {
            DB::statement("CALL creerUsager(?, ?, ?, ?, ?)", [
                $formFields['email'],
                $formFields['lastname'],
                $formFields['firstname'],
                $formFields['birthdate'],
                $password
            ]);
    
            return redirect('/login')->with('message', 'Compte créé avec succès');
        } catch (QueryException $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function loginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $data = array(
            "courriel" => $request['email'],
            "password" => $request['password']
        );
        if(auth()->attempt($data)) {
            $request->session()->regenerate();
            return redirect('/profile')->with('message', 'Bienvenue sur BloomingPals, '.auth()->user()->prenom);
        }
        return back()->withErrors(['email'=>'Le courriel et le mot de passe ne correspondent pas'])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    

}
