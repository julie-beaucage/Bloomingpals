<?php

namespace App\Http\Controllers;

use App\Models\cities;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rencontre;
use App\Models\utilisateur;
use App\Models\rencontre_utlisateur;
use App\Models\demande_rencontre;



class MeetupController extends Controller
{
    public function index()
    {
        return view('home.feed');
    }
    public function createForm($errors = null, $data = null)
    {
        $listCities = $this->getCities();

        return view('meetups.meetupForm', compact('listCities', 'errors', 'data'));
    }

    public function create(Request $req)
    {
        $errors = $this->verifErrors($req);
        // verification fail
        if ($errors['error'] == true) {

            $data = [
                'nom' => $req->nom,
                'description' => $req->description,
                'adresse' => $req->adresse,
                'ville' => $req->ville,
                'date' => $req->date,
                'heure' => $req->heure,
                'participant' => $req->nb_participant,
                'image' => $req->image
            ];

            return $this->createForm($errors, $data);
        } else {
            $id=Auth::user()->Id;
            if(isset($id)){
                $public= $req->prive != null;
                DB::statement("Call create_rencontre(?,?,?,?,?,?,?,?)",[
                    $req->nom,
                    $req->description,
                    $id,
                    $req->ville,
                    date_create($req->date + $req->heure),
                    $req->nb_participant,
                    $req->image,
                    $public
                ]);
            }
            dd("Form submit");
        }
    }

    private function verifErrors(Request $req)
    {
        //si contient au moins une lettre
        $regex_OneLetter = '/[a-zA-Z]/';

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
        if (strlen($req->description) > 1024) {
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

    public function LeaveMeetup($meetupId) {
        $meetupData = rencontre::where("id", $meetupId)->get()[0];
        rencontre_utlisateur::DeleteParticipant(Auth::user()->id, $meetupId);
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
        if (isset($meetupId)) {
            $meetupData = rencontre::where("id", $meetupId)->get()[0];
            $meetupTags = rencontre::GetTags($meetupId);
            $organisator = rencontre::GetOrganisator($meetupId);
            $participants = rencontre::GetParticipants($meetupId);
            $GetRequestMeetupCount = demande_rencontre::GetRequestMeetupCount($organisator->id);

            /** a faire: 
             * -s'assurer que le client peut y accéder car il doit être amis si l'événement est priver
             * -faire que le boutton pour rejoindre, modifier, ou quitter soit présent. */


            return view("meetups.meetupPage", ['meetupData' => $meetupData, "meetupTagsData" => $meetupTags, 
                "organisatorData" => $organisator, "participantsData" => $participants, 
                "requestsParticipantsCount" => $GetRequestMeetupCount]);
        }
    }

    public function MeetupRequests($meetupId) {
        $meetupData = rencontre::where("id", $meetupId)->get()[0];
        $organisator = rencontre::GetOrganisator($meetupId);
        $requests = demande_rencontre::GetRequestMeetup(/*Auth::user()->id*/1);
            return view("meetups.meetupRequests", ["meetupData" => $meetupData, "organisatorData" => $organisator, "requestsData" => $requests]);
        if (Auth::user()->id == $organisator->id) {
            $requests = demande_rencontre::GetRequestMeetup(Auth::user()->id);
            return view("meetups.meetupRequests", ["meetupData" => $meetupData, "organisatorData" => $organisator, "requestsData" => $requests]);
        } else {
            return view("deniedAccess.pageNotFound");
        }
    }
}
