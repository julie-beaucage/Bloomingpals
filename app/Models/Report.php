<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table= 'reports';

    public $timestamps = false;

    protected $fillable = ['id_user_send', 'id_object', 'id_type_object'];
    public static function AddReport($userId, $objectId, $objectTypeId) {
        $report = [
            "id_user_send" => $userId,
            "id_object" => $objectId,
            "id_type_object" => $objectTypeId
        ];
        Report::Create($report);
    }
}
