<?php

namespace App\Http\Controllers;
use App\Models\Event;

class EventController extends Controller
{

    public function event($id)
    {
        $event = Event::find($id);

        if ($event == null)
            return abort(404);
        
        return view('events.eventPage', [
            'event' => $event,
            'attendees' => []
        ]);
    }
}
