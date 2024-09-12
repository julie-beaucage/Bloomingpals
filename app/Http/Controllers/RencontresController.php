<?php

namespace App\Http\Controllers;

use App\Models\rencontre;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RencontresController extends Controller
{
    public function index(): View
    {
        return view('rencontres.rencontreslo');
    }
    public function create(): View
    {
        return view('rencontres.formRencontre');
    }
}