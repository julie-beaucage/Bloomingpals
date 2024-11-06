<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report_Object;
use App\Models\User;
use App\Models\Object_Type;

class Report extends Model
{
    protected $table= 'reports';

    public $timestamps = false;

    protected $fillable = ['id_user_send', 'id_user_receive', 'id_object', 'id_type_object'];
    public static function AddReport($userSend, $userReceive, $object, $objectTypeId) {
        $objectId = Report_Object::AddReportAndGetId($object);

        if (Report::where('id_user_send', $userSend)->where("id_user_receive", $userReceive)->count() == 0) {
            $report = [
                "id_user_send" => $userSend,
                "id_user_receive" => $userReceive,
                "id_object" => $objectId,
                "id_type_object" => $objectTypeId
            ];
            Report::Create($report);
        }
    }

    public static function GetReportsWithObject() {
        $reportsTab = [];
        $reports = Report::all();
        foreach ($reports as $report) {
            $tab = [
                "user_send" => User::Where("id", $report->id_user_send)->get()->first(),
                "user_receive" => User::Where("id", $report->id_user_receive)->get()->first(),
                "object" => Report_Object::GetReportObjectString($report->id_object),
                "object_type" => Object_Type::where("id", $report->id_type_object)->get()->first()
            ];
            array_push($reportsTab, $tab);
        }
        return $reportsTab;
    }
}
