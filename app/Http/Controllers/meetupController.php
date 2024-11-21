<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Meetup;
use App\Models\User_Interest;
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

use Route;

class meetupController extends BaseController
{
    public function create($eventId)
{
    $event = Event::findOrFail($eventId);
    return view('meetupForm', compact('event'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100',
        'description' => 'required|string|max:4096',
        'adress' => 'required|string|max:100',
        'city' => 'nullable|string|max:100',
        'date' => 'required|date',
        'nb_participant' => 'required|integer|min:2',
        'image' => 'nullable|image|max:2048',
        'public' => 'nullable|boolean',
        'id_owner' => 'required|integer|exists:users,id',
    ]);

    // Traitement de l'image si uploadé
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('meetups', 'public');
    }

    Meetup::create($validated);

    return redirect()->back()->with('success', 'Meetup créé avec succès !');
}

}