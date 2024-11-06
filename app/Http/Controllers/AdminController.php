<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AccessDenied() {
        return view("errors.404");
    }

    public function AdminReports() {
        return view("admin.adminReports");
    }
}
