<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report_Object extends Model
{
    protected $table= 'reports_objects';

    public $timestamps = false;

    protected $fillable = ['id_user_send', 'id_user_receive', 'id_object', 'id_type_object'];
    public static function AddReportAndGetId($object) {
        $report = [
            "id_user_send" => $userSend,
            "id_user_receive" => $userReceive,
            "id_object" => $objectId,
            "id_type_object" => $objectTypeId
        ];
        Report::Create($report);
    }
}
