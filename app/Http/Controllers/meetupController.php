<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Meetup;
use App\Models\User_Interest;
use App\Models\Interest;
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
use App\Models\Event;
use App\Models\Meetup_Interest;
use Illuminate\Support\Facades\Log;
use Route;

class MeetupController extends BaseController
{

    public function showMeetupForm($eventId)
    {
        $event = Event::findOrFail($eventId);
        $allInterest = Interest::all();
        $eventInterest = $event->interests;
        Log::debug('Interests for the event: ' . $eventInterest->pluck('name')->implode(', ')); // Log des intérêts associés (en une seule ligne)

        return view('meetups.meetupForm', compact('eventInterest','allInterest', 'event', 'eventId'));
    }

    // public function create(Request $request)
    // {
    //     Log::info('Données de la requête envoyées:', $request->all());
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:100',
    //         'description' => 'required|string|max:4096',
    //         'adress' => 'required|string|max:100',
    //         'city' => 'nullable|string|max:100',
    //         'date' => 'required|date',
    //         'nb_participant' => 'required|integer|min:2',
    //         'image_meetup' => 'nullable|image|max:2048',
    //         'public' => 'nullable|boolean',
    //         'id_owner' => 'required|integer|exists:users,id',
    //         'interests' => 'nullable|string', 
    //     ]);
    //     $userId = Auth::user()->id;
    //     $event = Event::findOrFail($request->event_id); 
    //     $imagePath = $event->image; 
    //     $validated['public'] = $request->has('public') ? true : false;
    //     $validated['image'] = $imagePath;

    //     $interests = $request->input('interests'); 
    //     Log::info('Interests: ', [$interests]);

    //     DB::statement('CALL creerRencontre(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
    //         $validated['name'],
    //         $validated['description'],
    //         $validated['id_owner'],
    //         $validated['adress'],
    //         $validated['city'] ?? null,  
    //         $validated['date'],
    //         $validated['nb_participant'],
    //         $validated['image'] ?? null, 
    //         $validated['public'],
    //         $interests 
    //     ]);
    //     return redirect()->route('profile', ['id' => $userId, 'tab' => 'meetups/meetups'])
    //     ->with('success', 'Meetup créé avec succès !');

    // }
    public function showMyMeetup($id){
        $user = User::findOrFail($id);
        $meetups = Meetup::getMeetupsByOwner($user->id); 
        $joinedMeetups = $user->joinedMeetups;
        if ($meetups->isEmpty() && $joinedMeetups->isEmpty()) {
            return view('meetups.meetups', [
                'message' => 'Aucune rencontre disponible', 
                'meetups' => $meetups,
                'joinedMeetups' => collect(), 
                'user' => $user,
            ]);
        }     
        return view('meetups.meetups', ['meetups' => $meetups, 'user' => $user, 'joinedMeetups' => $joinedMeetups ]);  
    }

    public function meetup_detail($id){
        $meetup = Meetup::findOrFail($id);
        if($meetup != null)
           return view('meetups.meetupDetail', compact('meetup'));
        return back();
    }

    public function manageRequests($meetupId)
    {
        $meetup = Meetup::findOrFail($meetupId);
        if (auth()->id() != $meetup->owner->id) {
            return redirect()->route('home')->with('error', 'Vous n\'êtes pas autorisé à gérer ce meetup.');
        }
        $pendingRequests = Meetup_Request::where('id_meetup', $meetupId)
        ->where('status', 'pending')
        ->get();

        foreach ($pendingRequests as $request) {
            $request->user_request = User::find($request->id_user);
        }
        return view('meetups.meetupManager', compact('meetup', 'pendingRequests'));
    }

    public function deleteMeetup($id)
    {
        if (!Auth::check()) {
            return redirect()->route('home')->with('error', 'Vous devez être connecté pour effectuer cette action.');
        }
        DB::statement('CALL DeleteMeetup(?)', [$id]);
        $userId = Auth::user()->id;
        return redirect()->route('profile', ['id' => $userId, 'tab' => 'meetups/meetups'])
            ->with('success', 'La rencontre a été supprimée avec succès.');
    }

    public function sendRequest($id)
    {
        $meetup = Meetup::find($id);
        $user = auth()->user();

        $meetupRequest = new Meetup_Request();
        $meetupRequest->id_user = $user->id;
        $meetupRequest->id_meetup = $meetup->id;
        $meetupRequest->status = 'pending'; 
        $meetupRequest->save();

        return redirect('/meetup/'.$id);
    }

    public function cancelRequest($meetupId, Request $request)
    {
        $userId = auth()->user()->id;

        $request = Meetup_Request::where('id_user', $userId)
                                ->where('id_meetup', $meetupId)
                                ->first();

        if (!$request) {
            return redirect()->back()->with('error', 'Aucune demande trouvée.');
        }
        $request->delete();
        return redirect('/meetup/'.$meetupId);
    } 
    public function acceptRequest($meetupId, $userId)
    {
        $meetup = Meetup::findOrFail($meetupId);
        $user = User::findOrFail($userId);
        if (auth()->user()->id != $meetup->id_owner) {
            return redirect('/home')->with('error', 'Vous n\'êtes pas le propriétaire de ce meetup.');
        }
        DB::statement('CALL accept_meetup_request(?, ?, ?)', [$meetup->id_owner, $userId, $meetupId]);
        return redirect()->route('meetup.manage', $meetupId)->with('success', 'Demande acceptée !');
    }

    public function refuseRequest($meetupId, $userId)
    {
        $meetup = Meetup::findOrFail($meetupId);
        if (auth()->user()->id != $meetup->id_owner) {
            return redirect('/home')->with('error', 'Vous n\'êtes pas le propriétaire de ce meetup.');
        }

        Meetup_Request::where('id_user', $userId)->where('id_meetup', $meetupId)->update(['status' => 'refused']);

        return redirect()->route('meetup.manage', $meetupId)->with('success', 'Demande refusée !');
    }
    public function leaveMeetup($meetupId) {
        $meetup = Meetup::findOrFail($meetupId);
        $user = auth()->user();
        if ($user->id == $meetup->id_owner) {
            return redirect('/home')->with('error', 'Vous ne pouvez pas quitter votre propre meetup.');
        }

        Meetup_Request::where('id_user', $user->id)->where('id_meetup', $meetup->id)->delete();
        Meetup_User::where('id_user', $user->id)->where('id_meetup', $meetup->id)->delete();
        return redirect('/meetup/'.$meetupId);
    }
    public function removeRequest($meetupId, $userId) {
        $meetup = Meetup::findOrFail($meetupId);
        if (auth()->user()->id != $meetup->id_owner) {
            return redirect('/home')->with('error', 'Vous n\'êtes pas le propriétaire de ce meetup.');
        }
        
        Meetup_Request::where('id_user', $userId)->where('id_meetup', $meetupId)->delete();
        Meetup_User::where('id_user', $userId)->where('id_meetup', $meetupId)->delete();
        return redirect()->route('meetup.manage', $meetupId)->with('success', 'Demande supprimée.');
    }
    public function FormEvent($id)
    {
        return $this->Form($id, true);
    }
    public function Form($id = null, $isEvent = null)
    {
        if (Auth::user()->id != null) {
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
                1
            ]);

            $meetup = Meetup::where('image', $path)->where('date', date_create("$req->date" . " " . "$req->time"))
                    ->where('name', $req->name)->where('adress', $req->adress)->where('id_owner', $id_owner)->get();

            $id_meetup = 0;
            foreach ($meetup as $meet) {
                if ($meet->id > $id_meetup) {
                    $id_meetup = $meet->id;
                }
            }

            $obj = array('meetup' => $id_meetup,);
            DB::statement("Call addAction(?,?,?)", [
                $id_owner,
                'Meetup Create',
                json_encode($obj)
            ]);

            if ($req->interests != "") {
                $id_interests = explode(',', $req->interests);
                
                foreach ($id_interests as $id) {
                    Meetup_Interest::insert([
                        'id_interest' => $id,
                        'id_meetup' => $id_meetup
                    ]);
                }
            }
            DB::commit();

            return redirect('/meetup/' . $id_meetup);
        }

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
            //Artisan::call('storage:link'); // update les symLinks
            return redirect('/meetup/' . $id);
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

                Meetup_Request::where('id_meetup', $id)->delete();
                Meetup_User::where('id_meetup', $id)->delete();
                Meetup_Interest::where('id_meetup', $id)->delete();
                Meetup::where('id', $id)->delete();
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

    /* CODE DE WILL
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

    public function LeaveMeetup($meetupId)
    {
        $meetupData = Meetup::where("id", $meetupId)->get()[0];
        Meetup_User::DeleteParticipant(Auth::user()->id, $meetupId);
        Meetup_Request::CancelJoining(Auth::user()->id, $meetupId);


        return $this->MeetupPage($meetupId);
    }
    public function JoinMeetup($meetupId)
    {
        $userId = Auth::user()->id;

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

        DB::statement('Call addAction(?,?,?)',[$userId,'Meetup Join',[$meetupId]]);
        
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
*/
}