<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Meetup;
use illuminate\Support\Facades\Auth;
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
use App\Models\Meetup_Interest;

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
            array_push($users, Meetup::GetOrganisator($meetup->id));

        }
        //dd($meetups[0]);
        $default_images = $this->getDefault_images();

        return view('meetups.meetups', compact('meetups', 'users', 'default_images'));
    }
    public function FormEvent($id)
    {
        return $this->Form($id, true);
    }

    public function Form($id = null, $isEvent = null)
    {

        if ($isEvent == true) {
            $data = DB::table('events')
                ->select('*')
                ->where('id', $id)
                ->first();
            if ($data == null) {
                abort(404);
            }

            $data = json_decode(json_encode($data), true);
            $date = $data['date'];
            $date = explode(' ', $date);
            $data['date'] = $date[0];
            $data['time'] = $date[1];
            $data['nb_participant'] = '';
            $data['empty'] = true;
            // $data['description'] = ;
            $data['isEvent'] = $id;
        } else if ($id != null) {
            $data = Meetup::where('id', '=', $id)->first();

            if ($data == null) {
                abort(404);
            }
            if (Auth::user()->id != $data->id_owner) {
                abort(403);
            }
            $date = $data->date;
            $date = explode(' ', $date);
            $data->date = $date[0];
            $data->time = $date[1];
            $data['empty'] = false;
            $data['isEvent'] = false;
        } else {
            $data = new Meetup();
            $data['empty'] = true;
            $data['isEvent'] = false;
        }
        $listCities = $this->getCities();

        return view('meetups.form', compact('data', 'listCities'));
    }

    public function create(Request $req, $isEvent = null)
    {
        $id_owner = Auth::user()->id;
        $path = null;
        if ($isEvent != null and $req->image == null) {
            $path = DB::table('events')
                ->select('image')
                ->where('id', $isEvent)
                ->first()->image;

        } else if ($req->file('image') != null) {
            if ($req->file('image')->getError() == 0) {
                $path = $req->file('image')->store('public/meetup/images');
                $path = str_replace('public/', '', 'storage/' . $path);
            }

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

            if ($req->interests != "") {
                $id_interests = explode(',', $req->interests);
                $meetup = Meetup::where('image', $path)->where('date', date_create("$req->date" . " " . "$req->time"))
                    ->where('name', $req->name)->where('adress', $req->adress)->where('id_owner', $id_owner)->first();

                foreach ($id_interests as $id) {
                    Meetup_Interest::insert([
                        'id_interest' => $id,
                        'id_meetup' => $meetup->id
                    ]);
                }
                DB::commit();
            }

        }
        Artisan::call('storage:link'); // update les symLinks

        return redirect('/home');
    }
    public function edit($id = null, Request $req)
    {

        if ($id != null) {

            $id_owner = Auth::user()->id;
            $meetup = Meetup::where('id', $id)->first();
            if ($id_owner != $meetup->id_owner) {
                abort(403);
            }
            if ($req->image != 'delete' and $req->image != '') {

                $oldPath = str_replace('storage', 'public', $meetup->image);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
                $path = $req->file('image')->store('public/meetup/images');
                $path = str_replace('public/', '', 'storage/' . $path);
            } else {
                $path = '';
            }

            if ($req->image == 'delete') {
                $oldPath = str_replace('storage', 'public', $meetup->image);
                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
                $path = $req->image;
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

                Meetup_Interest::where('id_meetup', $id)->delete();
                if ($req->interests != "") {
                    $id_interests = explode(',', $req->interests);

                    foreach ($id_interests as $id_int) {
                        Meetup_Interest::insert([
                            'id_interest' => $id_int,
                            'id_meetup' => $id
                        ]);
                    }
                   
                }
                DB::commit();
            }
            Artisan::call('storage:link'); // update les symLinks
            return redirect('/home');
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

    private function getCities()
    {
        $cities = City::orderBy('city_ascii', 'ASC')->get();
        return $cities;
    }

    private function getDefault_images()
    {
        return ['storage\images\meetup_default1.png', 'storage\images\meetup_default2.png', 'storage\images\meetup_default3.png'];
    }
    public function interests($id_meetup)
    {

        return DB::table('interests')
            ->join('meetups_interests', 'id', '=', 'meetups_interests.id_interest')
            ->select('id', 'name', 'id_category')
            ->where('id_meetup', $id_meetup)
            ->get();
    }
    public function LeaveMeetup($meetupId)
    {
        $meetupData = Meetup::where("id", $meetupId)->get()[0];
        Meetup_User::DeleteParticipant(Auth::user()->id, $meetupId);
        Meetup_Request::CancelJoining(Auth::user()->id, $meetupId);


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
            Meetup_Request::AddMeetupRequest($userId, $meetupId);
            return $this->MeetupPage($meetupId);
        } else {
            Meetup_Request::AddMeetupRequest($userId, $meetupId);
            return $this->MeetupPage($meetupId);
        }
    }
    public function MeetupPage($meetupId)
    {

        $meetupData = Meetup::where("id", $meetupId)->get()[0];
        $meetupTags = Meetup::GetTags($meetupId);
        $organisator = Meetup::GetOrganisator($meetupId);
        $participants = Meetup::GetParticipants($meetupId);
        $GetRequestMeetupCount = Meetup_Request::GetMeetupRequestsNotAnswerdCount($meetupId);
        $joining = Meetup_Request::IsUserRequesting(Auth::user()->id, $meetupId);

        /** a faire: 
         * -s'assurer que le client peut y accéder car il doit être amis si l'événement est priver
         * -faire que le boutton pour rejoindre, modifier, ou quitter soit présent. */


        return view("meetups.meetupPage", [
            'meetupData' => $meetupData,
            "meetupTagsData" => $meetupTags,
            "organisatorData" => $organisator,
            "participantsData" => $participants,
            "requestsParticipantsCount" => $GetRequestMeetupCount,
            "userRequested" => $joining
        ]);
    }
    public function CancelJoiningMeetup($meetupId)
    {
        $joining = Meetup_Request::IsUserRequesting(Auth::user()->id, $meetupId);
        if ($joining == "joining") {
            Meetup_Request::CancelJoining(Auth::user()->id, $meetupId);
            return $this->MeetupPage($meetupId);
        } else {
            return $this->MeetupPage($meetupId);
        }
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
