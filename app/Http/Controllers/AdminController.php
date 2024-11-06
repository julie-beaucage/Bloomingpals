<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;


class AdminController extends Controller
{
    public function AccessDenied() {
        return view("errors.404");
    }

    public function AdminReports() {
        $reports = Report::GetReportsWithObject();
        return view("admin.adminReports", compact('reports'));
    }

    public function BanUser(Request $request) {

        $user = User::BanUser($request["id"]);
        return redirect()->back();
    }
}
