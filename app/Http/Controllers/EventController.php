<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function EventPage($eventId) {
        return view("events.eventPage");
    }
}
