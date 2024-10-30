<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report_Object extends Model
{
    protected $table= 'reports_objects';

    public $timestamps = false;

    protected $fillable = ['description'];
    public static function AddReportAndGetId($object) {
        $report = [
            "description" => $object
        ];
        $report = Report_Object::Create($report);

        return $report->id;
    }
}
