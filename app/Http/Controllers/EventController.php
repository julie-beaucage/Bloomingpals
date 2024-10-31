<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

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
    public function interests($id){
        return DB::table('interests')
            ->join('events_interests', 'id', '=', 'events_interests.id_interest')
            ->select('id', 'name', 'id_category')
            ->where('id_event', $id)
            ->get();
    }
}