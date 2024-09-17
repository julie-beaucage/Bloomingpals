<?php

namespace App\Http\Controllers;

use App\Models\cities;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class meetupController extends BaseController
{
    public function index(){
        return view('home.feed');
    }
    public function createForm($errors=null){
       $listCities= $this->getCities();

        return view('meetups.meetupForm', compact('listCities','errors'));
    }
    
    public function create(Request $req){
         //si contient au moins une lettre
         $regex_OneLetter='/[a-zA-Z]/';
         $error=false;
         $errors=['participant'=>'', 'nom'=>'', 'adresse'=>'',
          'ville'=>''];

        //participant
        if($req->nb_participant >100 or $req->nb_participant <2 ){
            //to do error (ne risque pas d'arriver)
            $error=true;
            $errors['participant']= "Le nombre de participant n'est pas entre 2 et 100";
        }
          //nom
        if(!preg_match($regex_OneLetter,$req->nom)){
            //to do error
            $error=true;
        }
        // adresse
        if(!preg_match($regex_OneLetter,$req->nom)){
            //to do error
            $error=true;
        }
        // ville
        //if()
        if(!DB::table('canadacities')->where('city',$req->ville)->get()){
            //to do error
            $error=true;
            $errors['ville']= "$req->ville n'est pas une ville";
        }
        
        

        
    }
        
    

    private function getCities(){
        $cities= cities::orderBy('city_ascii','ASC')->get();
        return $cities;
        
    }
    
}
