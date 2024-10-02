<?php

namespace App\Http\Controllers;

use App\Models\cities;
use App\Models\rencontre;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\demande_rencontre;
use App\Models\rencontre_utlisateur;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Models\User;

use Route;

class MeetupController extends BaseController
{
    public function index($meetups=null)
    {
        if($meetups == null){$meetups = rencontre::whereRaw('id>0')->get();}
        
        
        $users=[];

        foreach($meetups as $meetup){
            array_push($users,User::where('id',$meetup->id_organisateur)->first());

        }
        //dd($users[0]);
        $default_images=$this->getDefault_images();

        return view('meetups.meetups',compact('meetups','users','default_images'));
    }

    public function Form($id = null, $errors = null, $data = null)
    {
        $actionCreate = true;

        // editForm
       if($id != null){$actionCreate = false;}
        if ($id != null and $errors == null) {
            $id_owner = Auth::user()->id;

            
            //$id_owner = 1;

            $actionCreate = false;
            $rencontre = rencontre::where('id', $id)->first();

            if ($rencontre != null) {
                if ($id_owner != $rencontre->id_organisateur) {
                    abort(403);
                }

                $date = $rencontre->date;
                $date = explode(' ', $date);
                //dd($rencontre->image);
                $data = [
                    'nom' => $rencontre->nom,
                    'description' => $rencontre->description,
                    'adresse' => $rencontre->adresse,
                    'ville' => $rencontre->ville,
                    'date' => $date[0],
                    'heure' => $date[1],
                    'participant' => $rencontre->nb_participant,
                    'image' =>$rencontre->image == null ? '': $rencontre->image ,
                    'public' => $rencontre->public,
                    'id' => $id,
                    'temporaryImage' => '',
                ];
            } else {
                abort(404);
            }
        }
        $listCities = $this->getCities();

        if ($errors == null)
            $errors = $this->getErrorsArray();

        return view('meetups.meetupForm', compact('actionCreate', 'listCities', 'errors', 'data'));
    }

    public function create(Request $req)
    {
        $errors = $this->verifErrors($req);
        // verification fail
        $public = $req->prive == null ? true : false;
        if ($errors['error'] == true) {


            if ($req->file('image') != null) {
                $path = $req->file('image')->store('public/tempo\images');
                $path =str_replace('public/','','storage/' . $path);
            } else {
                $path = '';
            }

            $data = [
                'nom' => $req->nom,
                'description' => $req->description,
                'adresse' => $req->adresse,
                'ville' => $req->ville,
                'date' => $req->date,
                'heure' => $req->heure,
                'participant' => $req->nb_participant,
                'image' => $req->image,
                'public' => $public,
                'temporaryImage' => $path,
            ];
            Artisan::call('storage:link'); // update les symLinks


            return $this->Form(null, $errors, $data);
        } else {
            $id_owner = Auth::user()->id;


            $path = null;
            if ($req->temporaryImage != null) {
                $realPath = str_replace('storage', 'public', $req->temporaryImage);
                $tabExplode = explode('/', $req->temporaryImage);
            
                $fileName = $tabExplode[count($tabExplode) - 1];
                if (Storage::move($realPath, 'public/meetup\images/' . $fileName) == 1) {
                    $path = 'storage\meetup\images/' . $fileName;
                }

                

            } else if ($req->file('image') != null) {
                $path = $req->file('image')->store('public/tempo\images');
                $path =str_replace('public/','','storage/' . $path);
                
            }
            if (isset($id_owner)) {
                DB::statement("Call creerRencontre(?,?,?,?,?,?,?,?,?)", [
                    $req->nom,
                    $req->description,
                    $id_owner,
                    $req->adresse,
                    $req->ville,
                    date_create("$req->date" . " " . "$req->heure"),
                    $req->nb_participant,
                    $path,
                    $public
                ]);
            }
            Artisan::call('storage:link'); // update les symLinks

            return redirect('/meetup');
        }
    }
    public function edit($id = null, Request $req)
    {
        if ($id != null) {

            $public = $req->prive == null ? true : false;
            $errors = $this->verifErrors($req);

            if ($errors['error'] == true) {

                if ($req->file('image') != null) {
                    $path = $req->file('image')->store('public/tempo\images');
                $path =str_replace('public/','','storage/' . $path);
                } else {
                    $path = '';
                }

                $data = [
                    'nom' => $req->nom,
                    'description' => $req->description,
                    'adresse' => $req->adresse,
                    'ville' => $req->ville,
                    'date' => $req->date,
                    'heure' => $req->heure,
                    'participant' => $req->nb_participant,
                    'image' => $req->image,
                    'public' => $public,
                    'id' => $id,
                    'temporaryImage' => $path,
                ];
                Artisan::call('storage:link'); // update les symLinks

                return $this->Form($id, $errors, $data);
            } else {

                $id_owner = Auth::user()->id;
                $rencontre = rencontre::where('id', $id)->first();

                if ($id_owner != $rencontre->id_organisateur) {
                    abort(403);
                }

                if ($req->image == null) {
                    $path = '';
                } else {
                   
                    $oldPath =str_replace('storage', 'public', $rencontre->image);
                    if (File::exists($oldPath)) {
                        File::delete($oldPath);
                    } else {
                        // image pas trouvee
                        // dd('file not found');
                    }

                    $path = $req->file('image')->store('public/tempo\images');
                $path =str_replace('public/','','storage/' . $path);
                }

                if (isset($id_owner)) {

                    DB::statement("Call modifierRencontre(?,?,?,?,?,?,?,?,?,?)", [
                        $id,
                        $req->nom,
                        $req->description,
                        $id_owner,
                        $req->adresse,
                        $req->ville,
                        date_create("$req->date" . " " . "$req->heure"),
                        $req->nb_participant,
                        $path,
                        $public
                    ]);
                }
                Artisan::call('storage:link'); // update les symLinks
                return redirect('/meetup');
            }
        }
    }
    public function delete($id){
        $rencontre = rencontre::where('id', $id)->first();
        if($rencontre != null){

            if (File::exists($rencontre->image)) {
                File::delete($rencontre->image);
            }

            if(Auth::user()->id == $rencontre->id_organisateur){
                DB::statement("Call effacerRencontre(?)", [
                    $id
                ]);
            }

        }else {
            abort(404);
        }
        return redirect('/meetup');
    }
    private static function getErrorsArray()
    {
        $errors = [
            'error' => false,
            'participant' => '',
            'nom' => '',
            'adresse' => '',
            'ville' => '',
            'date' => '',
            'heure' => '',
            'description' => '',
        ];
        return $errors;
    }

    private function verifErrors(Request $req)
    {
        //si contient au moins une lettre
        $regex_OneLetter = '/[a-zA-Z]/';

        $errors = $this->getErrorsArray();

        //participant
        if ($req->nb_participant > 100 or $req->nb_participant < 2) {
            $errors['error'] = true;
            $errors['participant'] = "Le nombre de participant n'est pas entre 2 et 100 !";
        }

        //nom
        if (strlen($req->nom) > 100) {
            $errors['error'] = true;
            $errors['nom'] = "Le nom doit être moins long que 100 caractères !";
        }

        if (!preg_match($regex_OneLetter, $req->nom)) {
            $errors['error'] = true;
            $errors['nom'] = "Le nom doit contenir au moins une lettre !";
        }

        // adresse
        if (strlen($req->adresse) > 100) {
            $errors['error'] = true;
            $errors['adresse'] = "L'adresse doit être moins longue que 100 caractères !";
        }
        if (!preg_match($regex_OneLetter, $req->adresse)) {
            $errors['error'] = true;

            $errors['adresse'] = "L'adresse doit contenir au moins une lettre !";
        }
        // Description
        if (strlen($req->description) > 4096) {
            $errors['error'] = true;
            $errors['description'] = "La description doit être moins longue que 1024 caractères !";
        }

        // ville
        if (count(DB::table('canadacities')->where('city', $req->ville)->get()) < 1) {
            $errors['error'] = true;
            $errors['ville'] = "$req->ville n'est pas une ville !";
        }
        return $errors;
    }

    private function getCities()
    {
        $cities = cities::orderBy('city_ascii', 'ASC')->get();
        return $cities;
    }

    private function getDefault_images(){
        return ['storage\images\meetup_default1.png','storage\images\meetup_default2.png','storage\images\meetup_default3.png'];
    }
    public function LeaveMeetup($meetupId) {
        $meetupData = rencontre::where("id", $meetupId)->get()[0];
        rencontre_utlisateur::DeleteParticipant(Auth::user()->id, $meetupId);
        
        return $this->MeetupPage($meetupId);
    }
    public function ModifyMeetup($newMeetupData) {
        $meetupData = rencontre::where("id", $newMeetupData->id)->get()[0];

        $meetupData::update([
            "nom" => $newMeetupData->nom, 
            "description" => $newMeetupData->description,
            "adresse" => $newMeetupData->adresse,
            "date" => $newMeetupData->date,
            "nb_participant" => $newMeetupData->nb_participant,
            "image" => $newMeetupData->image,
            "public" => $newMeetupData->public]);

            return Back();
    }
    public function JoinMeetup($meetupId) {
        $userId = Auth::user()->id;
        /*join if public*/
        $meetupData = rencontre::where("id", $meetupId)->get()[0];
        if ($meetupData->public) {
            if (!rencontre_utlisateur::IsInRencontre($meetupId, $userId)) {
                rencontre_utlisateur::AddParticipant($userId, $meetupId);
                return $this->MeetupPage($meetupId);
            } else {
                return $this->MeetupPage($meetupId);
            }
        }
    }
    public function MeetupPage($meetupId) {

        $meetupData = rencontre::where("id", $meetupId)->get()[0];
        $meetupTags = rencontre::GetTags($meetupId);
        $organisator = rencontre::GetOrganisator($meetupId);
        $participants = rencontre::GetParticipants($meetupId);
        $GetRequestMeetupCount = demande_rencontre::GetMeetupRequestsNotAnswerdCount($meetupId);

        /** a faire: 
         * -s'assurer que le client peut y accéder car il doit être amis si l'événement est priver
         * -faire que le boutton pour rejoindre, modifier, ou quitter soit présent. */


        return view("meetups.meetupPage", ['meetupData' => $meetupData, "meetupTagsData" => $meetupTags, 
            "organisatorData" => $organisator, "participantsData" => $participants, 
            "requestsParticipantsCount" => $GetRequestMeetupCount]);
    }

    public function MeetupRequests($meetupId) {
        $organisator = rencontre::GetOrganisator($meetupId);
        if (Auth::user()->id != $organisator->id) {
            return view("deniedAccess.pageNotFound");
        }

        $meetupData = rencontre::where("id", $meetupId)->get()[0];
        $requests = demande_rencontre::GetMeetupRequestsNotAnswerd($meetupId);

        return view("meetups.meetupRequests", ["meetupData" => $meetupData, "organisatorData" => $organisator, "requestsData" => $requests]);
    }

    public function AcceptRequest($meetupId, $userId) {
        $organisator = rencontre::GetOrganisator($meetupId);
        if (Auth::user()->id != $organisator->id) {
            return view("deniedAccess.pageNotFound");
        }
        if (!demande_rencontre::IsInRequest($userId, $meetupId)) {
            return view("deniedAccess.pageNotFound");
        }

        rencontre_utlisateur::AddParticipant($userId, $meetupId);
        demande_rencontre::AcceptMeetupRequest($userId, $meetupId);

        return $this->MeetupRequests($meetupId);
    }

    public function DenyRequest($meetupId, $userId) {
        $organisator = rencontre::GetOrganisator($meetupId);
        if (Auth::user()->id != $organisator->id) {
            return view("deniedAccess.pageNotFound");
        }
        if (!demande_rencontre::IsInRequest($userId, $meetupId)) {
            return view("deniedAccess.pageNotFound");
        }

        demande_rencontre::DenyMeetupRequest($userId, $meetupId);

        return $this->MeetupRequests($meetupId);
    }

    public function RemoveParticipant($meetupId, $userId) {
        $organisator = rencontre::GetOrganisator($meetupId);
        if (Auth::user()->id != $organisator->id) {
            return view("deniedAccess.pageNotFound");
        }
        rencontre_utlisateur::DeleteParticipant($userId, $meetupId);

        return redirect()->back();
    }

}
