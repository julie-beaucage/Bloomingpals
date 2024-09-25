<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{

    public function index()
    {
        return view('auth.index');
    }

    public function registerForm()
    {
        return view('auth.signIn');
    }
    public function create(Request $request)
    {
        $formFields = $request->validate([
            'lastname' => ['required', 'min:3', 'max:20'],
            'firstname' => ['required', 'min:3', 'max:20'],
            'birthdate' => ['required', 'date', 'before:today'],
            'email' => ['required', 'email', 'max:100', Rule::unique('utilisateur', 'email')],
            'genre' => ['required', 'in:femme,hommme,non-genre'],
            'password' => ['required', 'confirmed', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/']
        ], [
            'password.regex' => "Le mot de passe doit respecter les critères suivants : <br>- Au moins un caractère spécial <br>- Au moins une majuscule <br>- Au moins une minuscule <br>- Au moins un chiffre.",
            'genre.in' => 'Le genre doit être l\'un des suivants : femme, homme, non-genre.'
        ]);

        $password = bcrypt($formFields['password']);

        DB::beginTransaction(); 

        try {
            DB::statement("CALL creerUsager(?, ?, ?, ?, ?,?)", [
                $formFields['email'],
                $formFields['lastname'],
                $formFields['firstname'],
                $formFields['birthdate'],
                $password,
                $formFields['genre']
            ]);

            $user = User::where('email', $formFields['email'])->first();

            if ($user) {
                if (!$user->hasVerifiedEmail()) {
                    $user->sendEmailVerificationNotification();
                }
            }
            DB::commit(); 
            return view('auth.verify'); 
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error('Erreur lors de la création de l\'utilisateur : ' . $e->getMessage());

            return back()->withErrors(['error' => $e->getMessage()]);
        }
    
    }
    

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = array(
            "email" => $request['email'],
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
    public function profile() {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('/login')->with('error', 'Utilisateur non trouvé.');
        }
        return view('profile.profile', compact('user'));

    }
    public function update(Request $request)
    {

        $formFields = $request->validate([
            'lastname' => ['required', 'min:3', 'max:20'],
            'firstname' => ['required', 'min:3', 'max:20'],
            'genre' => ['required', 'in:femme,homme,non-genre'],
        ]);
         Log::info('Validation réussie.', $formFields);

        DB::beginTransaction();
        try {
            if ($request->hasFile('image_profil')) {
                $formFields['image_profile'] = $request->file('image_profil')->store('images', 'public');
            }else {
                $formFields['image_profile'] = auth()->user()->image_profile;
            }

            if ($request->hasFile('background_image')) {
                $formFields['background_image'] = $request->file('background_image')->store('images', 'public');
            }else {
                $formFields['background_image'] = auth()->user()->background_image;
            }
            DB::statement("CALL updateUserProfile(?,?, ?, ?, ?, ?)", [
                auth()->user()->id, 
                $formFields['firstname'],
                $formFields['lastname'],
                $formFields['image_profile'],
                $formFields['background_image'],
                $formFields['genre']
            ]);

            DB::commit();
            return redirect()->route('profile')->with('success', 'Profil mis à jour avec succès!');
        } catch (QueryException $e) {
            DB::rollBack();

            Log::error('Erreur lors de la mise à jour du profil : ' . $e->getMessage());
            Log::info('erreur');

            return back()->withErrors(['error' => 'Erreur lors de la mise à jour du profil.']);
        }
    }
    public function upload_picture(Request $request){
        if($request->hasfile("image")){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs("image",$filename,"public");
            Auth()->user()->update(["image"->$filename]);
        }
        return redirect()->back();
    }

    public function publications($id) {
        $user = User::find($id);
        return view('profile.publications', compact('user'));    }

    public function amis($id) {
        $user = User::find($id);
        return view('profile.amis', compact('user'));    }

    public function personnalite($id) {
        return view('profile.personnalite', ['user' => User::findOrFail($id)]);
    }

    public function interets($id) {
        return view('profile.interets', ['user' => User::findOrFail($id)]);
    }
    

}
