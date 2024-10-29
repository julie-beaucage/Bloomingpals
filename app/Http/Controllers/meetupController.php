<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Meetup;
use App\Models\Type_Notification;
use App\Notifications\MeetupJoined;
use Auth;
use Event;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Meetup_Request;
use App\Models\Meetup_User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\NotificationController;
use App\Events\NewNotif;


use Route;

class MeetupController extends BaseController
{

    public function index($meetups = null)
    {
        if ($meetups == null) {
            $meetups = Meetup::whereRaw('id>0')->get();
        }


        $users = [];

        foreach ($meetups as $meetup) {
            array_push($users, User::where('id', $meetup->id_owner)->first());

        }
        //dd($users[0]);
        $default_images = $this->getDefault_images();

        $user = User::where('id', '1');
        //dd($user);

        //$user->notify(new MeetupJoined(1));
        //$type=Type_Notification::where('name','Meetup Joined')->first();

        if (Auth::user()->id == 1) {
            //event(new NewNotif(1, 2, 'Meetup Request', ['id' => 6]));
            //event(new NewNotif(1,2,'Friendship Request',[]));
            //event(new NewNotif(1,0,'Meetup Interest',['id'=>9]));
            event(new NewNotif(2,1,'Friendship Accept',[]));

        }

        //event(new NewNotif(1,2,'Friendship Request',[]));

        return view('meetups.meetups', compact('meetups', 'users', 'default_images'));

    }
    public function Form($id = null, $isEvent = null)
    {

        if ($id != null) {
            $data = Meetup::where('id', '=', $id)->first();

            if ($data == null and $isEvent == null) {
                abort(404);
            }
            if ($isEvent != null) {
                $dataEvent = DB::table('events')
                    ->select('*')
                    ->where('id', $id)
                    ->first();
                if ($dataEvent == null) {
                    abort(404);
                }
                
                $data = json_decode(json_encode($dataEvent), true);
                $date = $data['date'];
                $date = explode(' ', $date);
                $data['date'] = $date[0];
                $data['time'] = $date[1];
                $data['nb_participant'] = '';
                $data['empty'] = true;
                // $data['description'] = ;
                $data['isEvent'] = $id;

                //dd($data['image']);

            } else {
                $date = $data->date;
                $date = explode(' ', $date);
                $data->date = $date[0];
                $data->time = $date[1];
                $data['empty'] = false;
                $data['isEvent'] = false;
            }


        } else {
            $data = new Meetup();
            $data['empty'] = true;
            $data['isEvent'] = false;
        }
        $listCities = $this->getCities();

        return view('meetups.formm', compact('data', 'listCities'));
    }
    public function create( Request $req,$isEvent = null)
    {
        $id_owner = Auth::user()->id;
        $path = null;
        if ($isEvent != null and $req->image == null) {
            $path=DB::table('events')
            ->select('image')
            ->where('id', $isEvent)
            ->first()->image;

        } else if ($req->file('image') != null and $req->file('image')->getError() == 0) {
            $path = $req->file('image')->store('public/meetup/images');
            $path = str_replace('public/', '', 'storage/' . $path);
        }
        if (isset($id_owner)) {
            DB::statement("Call creerRencontre(?,?,?,?,?,?,?,?,?)", [
                $req->name,
                $req->description,
                $id_owner,
                $req->adress,
                $req->city,
                date_create("$req->date" . " " . "$req->time"),
                $req->nb_participant,
                $path,
                $req->public
            ]);
        }
        Artisan::call('storage:link'); // update les symLinks

        return redirect('/meetup');
    }
    public function edit($id = null, Request $req)
    {
        if ($id != null) {
            $id_owner = Auth::user()->id;
            $meetup = Meetup::where('id', $id)->first();
            if ($id_owner != $meetup->id_owner) {
                abort(403);
            }

            if ($req->image == null or $req->file('image')->getError() != 0) {
                $path = '';
            } else {

                $oldPath = str_replace('storage', 'public', $meetup->image);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
                $path = $req->file('image')->store('public/meetup/images');
                $path = str_replace('public/', '', 'storage/' . $path);
            }

            if (isset($id_owner)) {

                DB::statement("Call modifierRencontre(?,?,?,?,?,?,?,?,?,?)", [
                    $id,
                    $req->name,
                    $req->description,
                    $id_owner,
                    $req->adress,
                    $req->city,
                    date_create("$req->date" . " " . "$req->time"),
                    $req->nb_participant,
                    $path,
                    $req->public
                ]);
            }
            Artisan::call('storage:link'); // update les symLinks
            return redirect('/meetup');
        }
        abort(404);
    }
    public function delete($id)
    {
        $rencontre = Meetup::where('id', $id)->first();
        if ($rencontre != null) {
            if (Auth::user()->id == $rencontre->id_owner) {

                if (File::exists($rencontre->image)) {
                    File::delete($rencontre->image);
                }

                DB::statement("Call effacerRencontre(?)", [
                    $id
                ]);
            }


        } else {
            abort(404);
        }
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
        $cities = City::orderBy('city_ascii', 'ASC')->get();
        return $cities;
    }

    private function getDefault_images()
    {
        return ['storage\images\meetup_default1.png', 'storage\images\meetup_default2.png', 'storage\images\meetup_default3.png'];
    }
    public function LeaveMeetup($meetupId)
    {
        $meetupData = Meetup::where("id", $meetupId)->get()[0];
        Meetup_User::DeleteParticipant(Auth::user()->id, $meetupId);

        return $this->MeetupPage($meetupId);
    }
    public function ModifyMeetup($newMeetupData)
    {
        $meetupData = Meetup::where("id", $newMeetupData->id)->get()[0];

        $meetupData::update([
            "nom" => $newMeetupData->nom,
            "description" => $newMeetupData->description,
            "adresse" => $newMeetupData->adresse,
            "date" => $newMeetupData->date,
            "nb_participant" => $newMeetupData->nb_participant,
            "image" => $newMeetupData->image,
            "public" => $newMeetupData->public
        ]);

        return Back();
    }
    public function JoinMeetup($meetupId)
    {
        $userId = Auth::user()->id;
        /*join if public*/
        $meetupData = Meetup::where("id", $meetupId)->get()[0];
        if ($meetupData->public) {
            if (!Meetup_User::IsInRencontre($meetupId, $userId)) {
                Meetup_User::AddParticipant($userId, $meetupId);
                return $this->MeetupPage($meetupId);
            } else {
                return $this->MeetupPage($meetupId);
            }
        }
    }
    public function MeetupPage($meetupId)
    {

        $meetupData = Meetup::where("id", $meetupId)->get()[0];
        $meetupTags = Meetup::GetTags($meetupId);
        $organisator = Meetup::GetOrganisator($meetupId);
        $participants = Meetup::GetParticipants($meetupId);
        $GetRequestMeetupCount = Meetup_Request::GetMeetupRequestsNotAnswerdCount($meetupId);

        /** a faire: 
         * -s'assurer que le client peut y accéder car il doit être amis si l'événement est priver
         * -faire que le boutton pour rejoindre, modifier, ou quitter soit présent. */


        return view("meetups.meetupPage", [
            'meetupData' => $meetupData,
            "meetupTagsData" => $meetupTags,
            "organisatorData" => $organisator,
            "participantsData" => $participants,
            "requestsParticipantsCount" => $GetRequestMeetupCount
        ]);
    }

    public function MeetupRequests($meetupId)
    {
        $organisator = Meetup::GetOrganisator($meetupId);
        if (Auth::user()->id != $organisator->id) {
            return view("deniedAccess.pageNotFound");
        }

        $meetupData = Meetup::where("id", $meetupId)->get()[0];
        $requests = Meetup_Request::GetMeetupRequestsNotAnswerd($meetupId);

        return view("meetups.meetupRequests", ["meetupData" => $meetupData, "organisatorData" => $organisator, "requestsData" => $requests]);
    }

    public function AcceptRequest($meetupId, $userId)
    {
        $organisator = Meetup::GetOrganisator($meetupId);
        if (Auth::user()->id != $organisator->id) {
            return view("deniedAccess.pageNotFound");
        }
        if (!Meetup_Request::IsInRequest($userId, $meetupId)) {
            return view("deniedAccess.pageNotFound");
        }

        Meetup_User::AddParticipant($userId, $meetupId);
        Meetup_Request::AcceptMeetupRequest($userId, $meetupId);

        return $this->MeetupRequests($meetupId);
    }

    public function DenyRequest($meetupId, $userId)
    {
        $organisator = Meetup::GetOrganisator($meetupId);
        if (Auth::user()->id != $organisator->id) {
            return view("deniedAccess.pageNotFound");
        }
        if (!Meetup_Request::IsInRequest($userId, $meetupId)) {
            return view("deniedAccess.pageNotFound");
        }

        Meetup_Request::DenyMeetupRequest($userId, $meetupId);

        return $this->MeetupRequests($meetupId);
    }

    public function RemoveParticipant($meetupId, $userId)
    {
        $organisator = Meetup::GetOrganisator($meetupId);
        if (Auth::user()->id != $organisator->id) {
            return view("deniedAccess.pageNotFound");
        }
        Meetup_User::DeleteParticipant($userId, $meetupId);

        return redirect()->back();
    }

}
