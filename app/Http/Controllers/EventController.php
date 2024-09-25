<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Models\Event;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{

    public function event($id)
    {
        $event = Event::find($id);
        
        return view('events.eventPage', [
            'event' => $event
        ]);
    }

}