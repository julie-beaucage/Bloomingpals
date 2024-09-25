<?php

namespace App\Http\Controllers;

use App\Models\cities;
use App\Models\rencontre;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;



class meetupController extends BaseController
{
    public function index()
    {
        return view('home.feed');
    }

    public function Form($id = null, $errors = null, $data = null)
    {
        $actionCreate = true;

            // editForm
        if ($id != null) {
            //$id_owner = Auth::user()->Id;
            $id_owner =1;

            $actionCreate = false;
            $rencontre = rencontre::where('id',$id)->first();
            

            
            if($rencontre != null){
                if($id_owner != $rencontre->id_organisteur){
                    //retourner au forbidden
                }
    
                $date=$rencontre->date;
                $date=explode(' ',$date);               

                $data = [
                    'nom' => $rencontre->nom,
                    'description' => $rencontre->description,
                    'adresse' => $rencontre->adresse,
                    'ville' => $rencontre->ville,
                    'date' => $date[0],
                    'heure' => $date[1],
                    'participant' => $rencontre->nb_participant,
                    'image' =>$rencontre->image,
                    'public' => $rencontre->public,
                ];
            }else{
                //retourner not found
            }

            
        }
        $listCities = $this->getCities();

        if($errors == null)$errors = $this->getErrorsArray();

        return view('meetups.meetupForm', compact('actionCreate', 'listCities', 'errors', 'data'));
    }

    public function create(Request $req)
    {
        $errors = $this->verifErrors($req);
        // verification fail
        if ($errors['error'] == true) {

            $data = [
                'nom' => $req->nom,
                'description' => $req->description,
                'adresse' => $req->adresse,
                'ville' => $req->ville,
                'date' => $req->date,
                'heure' => $req->heure,
                'participant' => $req->nb_participant,
                'image' => $req->image,
                'public' => $public = $req->prive != null,
            ];

            return $this->Form( null,$errors, $data);
        } else {
            //$id = Auth::user()->Id;
            

           $path= $req->file('image')->store('meetup\images');
           $path='storage/'.$path;

           

           //var_dump($file);
            $id=1;
            if (isset($id)) {
                $public = $req->prive != null;
                DB::statement("Call creerRencontre(?,?,?,?,?,?,?,?,?)", [
                    $req->nom,
                    $req->description,
                    $id,
                    $req->adresse,
                    $req->ville,
                    date_create("$req->date"." "."$req->heure"),
                    $req->nb_participant,
                    $path,
                    $public
                ]);
            }
            Artisan::call('storage:link'); // update les symLinks
            
        }
    }
    public function edit()
    {
        dd('edit');
    }
    private static function getErrorsArray(){
        $errors = [
            'error' => false,
            'participant' => '',
            'nom' => '',
            'adresse' => '',
            'ville' => '',
            'date' => '',
            'heure' => '',
            'description' => '',
        ];
        return $errors;
    }
    
    private function verifErrors(Request $req)
    {
        //si contient au moins une lettre
        $regex_OneLetter = '/[a-zA-Z]/';

        $errors= $this->getErrorsArray();

        //participant
        if ($req->nb_participant > 100 or $req->nb_participant < 2) {
            $errors['error'] = true;
            $errors['participant'] = "Le nombre de participant n'est pas entre 2 et 100 !";
        }

        //nom
        if (strlen($req->nom) > 100) {
            $errors['error'] = true;
            $errors['nom'] = "Le nom doit être moins long que 100 caractères !";
        }

        if (!preg_match($regex_OneLetter, $req->nom)) {
            $errors['error'] = true;
            $errors['nom'] = "Le nom doit contenir au moins une lettre !";
        }

        // adresse
        if (strlen($req->adresse) > 100) {
            $errors['error'] = true;
            $errors['adresse'] = "L'adresse doit être moins longue que 100 caractères !";
        }
        if (!preg_match($regex_OneLetter, $req->adresse)) {
            $errors['error'] = true;

            $errors['adresse'] = "L'adresse doit contenir au moins une lettre !";
        }
        // Description
        if (strlen($req->description) > 1024) {
            $errors['error'] = true;
            $errors['description'] = "La description doit être moins longue que 1024 caractères !";
        }

        // ville
        if (count(DB::table('canadacities')->where('city', $req->ville)->get()) < 1) {
            $errors['error'] = true;
            $errors['ville'] = "$req->ville n'est pas une ville !";
        }
        return $errors;
    }

    private function getCities()
    {
        $cities = cities::orderBy('city_ascii', 'ASC')->get();
        return $cities;
    }

}
