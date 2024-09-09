<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function EventPage($eventId) {
        if (isset($eventId)) {
            return view("events.eventPage", ['eventId' => strval($eventId)]);
        } else {
            return view("events.eventPage", ['eventId' => 1]);
        }
    }
}
