<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\User;
use App\Models\Meetup;
use App\Models\Event;
use App\Models\Relation;
use App\Models\Friendship_Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\User_Interest;
use App\Events\NewNotif;
use Illuminate\Support\Facades\Validator;

use Symfony\Component\HttpKernel\Profiler\Profile;

class UsersController extends Controller
{
    public function registerForm()
    {
        return view('auth.signIn');
    }

    public function create(Request $request)
    { 
        $validator = Validator::make($request->all(),[
            'lastname' => ['required', 'min:3', 'max:20'],
            'firstname' => ['required', 'min:3', 'max:20'],
            'birthdate' => ['required', 'date', 'before:' . now()->subYears(15)->toDateString()],
            'email' => ['required', 'email', 'max:100', Rule::unique('users', 'email')],
            'genre' => ['required', Rule::in(['homme', 'femme', 'non-genre'])],
            'password' => ['required', 'confirmed', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/']
        ], [
            'lastname.required' => 'Le champ nom est obligatoire.',
            'lastname.min' => 'Le nom doit contenir au moins :min caractères.',
            'lastname.max' => 'Le nom ne peut pas dépasser :max caractères.',

            'firstname.required' => 'Le champ prénom est obligatoire.',
            'firstname.min' => 'Le prénom doit contenir au moins :min caractères.',
            'firstname.max' => 'Le prénom ne peut pas dépasser :max caractères.',

            'birthdate.required' => 'La date de naissance est obligatoire.',
            'birthdate.date' => 'La date de naissance doit être une date valide.',
            'birthdate.before' => 'Vous devez avoir au moins 15 ans.',

            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.max' => 'L\'email ne peut pas dépasser :max caractères.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',

            'genre.required' => 'Le genre est obligatoire.',
            'genre.in' => 'Le genre doit être l\'un des suivants : femme, homme, non-genre.',

            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.regex' => "Le mot de passe doit respecter les critères suivants : <br>- Au moins un caractère spécial <br>- Au moins une majuscule <br>- Au moins une minuscule <br>- Au moins un chiffre.",
        ]);

        $formFields = $request->all();
        $password = bcrypt($formFields['password']);
        if ($validator->fails()) {
            $showModal=true;
            return redirect()->back()->withErrors($validator)->withInput()->with('showModal', $showModal);

        }
        DB::beginTransaction();

        $showModal = true;
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
            return redirect()->back()
            ->withInput()
            ->with('error', 'Erreur lors de la création de l\'utilisateur : ' . $e->getMessage())
            ->with('showModal', $showModal);
        }

    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = array(
            "email" => $request['emailLogin'],
            "password" => $request['password']
        );
        if (auth()->attempt($data)) {
            $request->session()->regenerate();
            $id = auth()->user()->id;
            $notifController = new NotificationController();
            $notifController->sendAllToNoficationTable($id);
            $notifController->sendDailyNotification();
            
            return redirect('/profile/' . $id)->with('message', 'Bienvenue sur BloomingPals, ' . auth()->user()->prenom);
        }
        return redirect()->back()->with('error', 'Identifiants incorrects.');
    }


    public function resend(Request $request)
    {
        $user = Auth::user();
        Log::info("resend fonction");

        if ($user) {
            Log::info("renvoie de courriel fait ");

            $user->sendEmailVerificationNotification();
            return redirect()->back()->with('message', 'Un lien de vérification a été renvoyé à votre adresse email.');
        }

        return redirect()->back()->with('error', 'Utilisateur non authentifié.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home');
    }
    public function profile($id,$modified =false)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('home')->with('error', 'Utilisateur non trouvé.');
        }
        $profileCompletion = 0;
        $emailVerified = $user->hasVerifiedEmail();
        $interetsUtilisateurTab = User_Interest::getInteretsParUtilisateurTab($id);
        $interestsSelected = count($interetsUtilisateurTab) > 0;
        $personalityTestDone = $user->personality != null;

        if ($emailVerified) {
            $profileCompletion += 1;
        }
        if ($interestsSelected) {
            $profileCompletion += 1;
        }
        if ($personalityTestDone) {
            $profileCompletion += 1;
        }

        $profileCompletionPercentage = ($profileCompletion / 3) * 100;
        $profileCompletionPercentage = round($profileCompletionPercentage);

        $relation = Relation::GetRelationUsers(Auth::user()->id, $id);
        $haveAccess = false;

        if ($user->confidentiality == "prive" && $user->id == Auth::user()->id) {
            $haveAccess = true;
        } else if ($user->confidentiality == "friends" && ($relation == "Friend" || $user->id == Auth::user()->id)) {
            $haveAccess = true;
        } else if ($user->confidentiality == "public") {
            $haveAccess = true;
        }

        if ($relation == 'GotBlocked') {
            return redirect()->back();
        } else if ($relation != "Friend") {
            $relationRequest = Friendship_Request::GetUserRelationState(Auth::user()->id, $id);
            if ($relationRequest == "sent") {
                $relation = "SendingInvitation";
            } else if ($relationRequest == "receive") {
                $relation = "Invited";
            } else if ($relationRequest == "refuse") {
                $relation = "Refuse";
            }
        }
        return view('profile.profile', compact('user', 'profileCompletionPercentage', 'emailVerified', 'interestsSelected', 'personalityTestDone', 'relation','modified', 'haveAccess','relationRequest'));
    }


    public function update(Request $request)
    {
        $formFields = $request->validate([
            'lastname' => ['required', 'min:3', 'max:20'],
            'firstname' => ['required', 'min:3', 'max:20'],
            'genre' => ['required', 'in:femme,homme,non-genre'],
        ]);

        DB::beginTransaction();
        try {
            $user = auth()->user();
            if ($request->hasFile('image_profile')) {
                if ($user->image_profil && Storage::disk('public')->exists($user->image_profil)) {
                    Storage::disk('public')->delete($user->image_profil);
                }
                $formFields['image_profile'] = $request->file('image_profile')->store('images', 'public');
            } else {
                $formFields['image_profile'] = $user->image_profil;
            }

            if ($request->hasFile('background_image')) {
                if ($user->background_image && Storage::disk('public')->exists($user->background_image)) {
                    Storage::disk('public')->delete($user->background_image);
                }
                $formFields['background_image'] = $request->file('background_image')->store('images', 'public');
            } else {
                $formFields['background_image'] = $user->background_image;
            }

            DB::statement("CALL updateUserProfile(?, ?, ?, ?, ?, ?)", [
                $user->id,
                $formFields['firstname'],
                $formFields['lastname'],
                $formFields['image_profile'],
                $formFields['background_image'],
                $formFields['genre']
            ]);
            DB::commit();
            return redirect()->route('profile', ['id' => $user->id])->with('success', 'Profil mis à jour avec succès!');
        } catch (QueryException $e) {
            DB::rollBack();
            Log::error('Erreur lors de la mise à jour du profil : ' . $e->getMessage());
            return back()->withErrors(['error' => 'Erreur lors de la mise à jour du profil.']);
        }
    }

    public function checkPassword(Request $req)
    {
        $data = array(
            "email" => Auth::user()->email,
            "password" => $req['password']
        );
        if (auth()->attempt($data)) {
            return 1;
        }
        return 'Le mot de passe ne correspond pas';
    }
    public function updateConfidentiality(Request $req, $id)
    {
        if ($req->confidentiality != null and $id != null and $req->notification != null) {
            DB::table('users')->where('id', '=', $id)->update(['confidentiality' => $req->confidentiality, 'notification' => $req->notification]);
            DB::commit();
            return redirect('/profile/'.Auth::user()->id);
        }
    }

    public function isEmailTaken(Request $req)
    {
        if (Auth::user()->id != null and $req->email != null) {
            $emailTaken = User::where('email', '=', $req->email)->first();

            if ($emailTaken != null) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    public function updateAccount(Request $req)
    {
        if ($req->password == null) {
            $req->password = "";
        } else {
            $req->password = bcrypt($req->password);
        }
        if ($req->email == null) {
            $req->email = "";
        }
        DB::statement("CALL updateAccount(?, ?, ?)", [
            Auth::user()->id,
            $req->password,
            $req->email
        ]);
        if ($req->email != "") {
            Auth::user()->sendEmailVerificationNotification();
        }
        return http_response_code(200);
    }

    public function amis($id)
    {
        $user = User::find($id);
        $users = Relation::GetFriends($id);
        return view('profile.amis', compact('user', 'users'));
    }

    public function personnalite($id)
    {
        return view('profile.personnalite', ['user' => User::findOrFail($id)]);
    }

    public function SendFriendRequest($id)
    {
        if (Auth::user()->id != $id) {
            Friendship_Request::AddFriendRequest(Auth::user()->id, $id);
            event(new NewNotif($id,Auth::user()->id,'Friendship Request',[]));
        }
        return redirect()->back();
    }

    public function AcceptFriendRequest($id)
    {
        if (Auth::user()->id != $id) {
            Friendship_Request::AcceptFriendRequest(Auth::user()->id, $id);
            Relation::AddFriend(Auth::user()->id, $id);
            event(new NewNotif($id,Auth::user()->id,'Friendship Accept',[]));
        }
        return redirect()->back();
    }
    public function RefuseFriendRequest($id)
    {
        if (Auth::user()->id != $id) {
            Friendship_Request::RefuseFriendRequest(Auth::user()->id, $id);
        }
        return redirect()->back();
    }
    public function CancelFriendRequest($id)
    {
        if (Auth::user()->id != $id) {
            Friendship_Request::CancelFriendRequest(Auth::user()->id, $id);
        }
        return redirect()->back();
    }
    public function RemoveFriend($id)
    {
        if (Auth::user()->id != $id) {
            Friendship_Request::RemoveFriendRequest(Auth::user()->id, $id);
            Relation::RemoveFriend(Auth::user()->id, $id);
        }
        return redirect()->back();
    }

    public function events($id) {
        $eventsData = Event::GetEventsFromUser($id);
        return view("profile.events", ["eventsData" => $eventsData, "type" => "event"]);
    }

    public function rencontres($id) {
        $MeetupsData = Meetup::GetMeetupsFromUser($id);
        return view("profile.events", ["eventsData" => $MeetupsData, "type" => "rencontre"]);
    }

}
