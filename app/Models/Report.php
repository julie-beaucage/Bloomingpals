<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Report_Object;

class Report extends Model
{
    protected $table= 'reports';

    public $timestamps = false;

    protected $fillable = ['id_user_send', 'id_user_receive', 'id_object', 'id_type_object'];
    public static function AddReport($userSend, $userReceive, $object, $objectTypeId) {
        $objectId = Report_Object::AddReportAndGetId($object);

        $report = [
            "id_user_send" => $userSend,
            "id_user_receive" => $userReceive,
            "id_object" => $objectId,
            "id_type_object" => $objectTypeId
        ];
        Report::Create($report);
    }
}
