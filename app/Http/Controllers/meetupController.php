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

class meetupController extends BaseController
{

    public function showMeetupForm($eventId)
    {
        $event = Event::findOrFail($eventId);
        $allInterest = Interest::all();
        $eventInterest = $event->interests;
        Log::debug('Interests for the event: ' . $eventInterest->pluck('name')->implode(', ')); // Log des intérêts associés (en une seule ligne)

        return view('meetups.meetupForm', compact('eventInterest','allInterest', 'event', 'eventId'));
    }

    public function create(Request $request)
    {
        Log::info('Données de la requête envoyées:', $request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:4096',
            'adress' => 'required|string|max:100',
            'city' => 'nullable|string|max:100',
            'date' => 'required|date',
            'nb_participant' => 'required|integer|min:2',
            'image_meetup' => 'nullable|image|max:2048',
            'public' => 'nullable|boolean',
            'id_owner' => 'required|integer|exists:users,id',
            'interests' => 'nullable|string', 
        ]);
        $userId = Auth::user()->id;
        $event = Event::findOrFail($request->event_id); 
        $imagePath = $event->image; 
        $validated['public'] = $request->has('public') ? true : false;
        $validated['image'] = $imagePath;

        $interests = $request->input('interests'); 
        Log::info('Interests: ', [$interests]);

        DB::statement('CALL creerRencontre(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $validated['name'],
            $validated['description'],
            $validated['id_owner'],
            $validated['adress'],
            $validated['city'] ?? null,  
            $validated['date'],
            $validated['nb_participant'],
            $validated['image'] ?? null, 
            $validated['public'],
            $interests 
        ]);
        return redirect()->route('profile', ['id' => $userId, 'tab' => 'meetups/meetups'])
        ->with('success', 'Meetup créé avec succès !');

    }
    public function showMyMeetup($id){
        $user = User::findOrFail($id);
        $meetups = Meetup::getMeetupsByOwner($user->id);  
        if ($meetups->isEmpty()) {
            return view('meetups.meetups', [
                'message' => 'Aucune rencontre disponible', 
                'meetups' => $meetups,                     
                'user' => $user                           
            ]);
        }        
        return view('meetups.meetups', ['meetups' => $meetups, 'user' => $user]);  
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
        if (auth()->id() !== $meetup->owner->id) {
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
            Log::info("Utilisateur non authentifié. Redirection...");
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

        return back()->with('success', 'Votre demande a été envoyée.');
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
        return redirect()->back()->with('success', 'Demande annulée.');
    } 
    public function acceptRequest($meetupId, $userId)
    {
        $meetup = Meetup::findOrFail($meetupId);
        $user = User::findOrFail($userId);
        if (auth()->user()->id !== $meetup->id_owner) {
            return redirect()->route('meetups.index')->with('error', 'Vous n\'êtes pas le propriétaire de ce meetup.');
        }
        DB::statement('CALL accept_meetup_request(?, ?, ?)', [$meetup->id_owner, $userId, $meetupId]);
        return redirect()->route('meetups.meetupManager', $meetupId)->with('success', 'Demande acceptée !');
    }

    public function declineRequest($meetupId, $userId)
    {
        $meetup = Meetup::findOrFail($meetupId);
        if (auth()->user()->id !== $meetup->id_owner) {
            return redirect()->route('meetups.index')->with('error', 'Vous n\'êtes pas le propriétaire de ce meetup.');
        }
        $meetup->interestedUsers()->detach($userId);
        return redirect()->route('meetups.meetupManager', $meetupId)->with('success', 'Demande refusée !');
    }

}