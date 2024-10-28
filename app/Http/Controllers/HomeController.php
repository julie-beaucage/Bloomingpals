<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Category_Interest;
use App\Models\User_Interest;
use App\Models\User;
use App\Models\Interest;
use App\Models\Meetup;
use App\Models\Meetup_Interest;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.home');
    }

    public function showcase() 
    {
        $meetups = Event::all()->take(20);
        return view('partial_views.event_cards', ['events' => $meetups]);
    }

    public function user_meetups() 
    {
        $meetups = Event::all()->take(20);
        return view('partial_views.meetup_cards', ['events' => $meetups]);
    }

    public function top_events() 
    {
        $events = Event::all()->take(20);
        return view('partial_views.event_cards', ['events' => $events]);
    }

    public function recent_meetups() 
    {
        $meetups = Meetup::orderBy('id', 'desc')->take(20)->get();
        return view('partial_views.meetup_cards', ['meetups' => $meetups]);
    }

    public function upcoming_events() 
    {
        $events = Event::where('date', '>', date('Y-m-d H:i:s'))->orderBy('date', 'asc')->take(20)->get();
        return view('partial_views.event_cards', ['events' => $events]);
    }
}
