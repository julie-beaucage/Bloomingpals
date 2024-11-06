<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
    public function AccessDenied() {
        return view("errors.404");
    }

    public function AdminReports() {
        $reports = Report::GetReportsWithObject();
        return view("admin.adminReports", compact('reports'));
    }
}
