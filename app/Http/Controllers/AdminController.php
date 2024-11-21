<?php

namespace App\Http\Controllers;

use App\Models\Meetup;
use App\Models\Meetup_Request;
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
        Meetup::RemoveAllMeetups($request["id"]);
        Meetup_Request::RemoveAllRequests($request["id"]);
        return redirect()->back();
    }

    public function CloseReport($user_send, $user_receive) {
        Report::RemoveReport($user_send, $user_receive);
        return redirect()->back();
    }
}
