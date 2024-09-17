<?php

namespace App\Http\Controllers;

use App\Models\cities;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class meetupController extends BaseController
{
    public function index(){
        return view('home.feed');
    }
    public function createForm(){
       $listCities= $this->getCities();

        return view('meetups.meetupForm', compact('listCities'));
    }

    private function getCities(){
        $cities= cities::orderBy('city_ascii','ASC')->get();
        return $cities;
        
    }
    
}
