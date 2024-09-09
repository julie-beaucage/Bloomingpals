<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DB extends Model
{
    use HasFactory;
    public function __construct() {
        $con = mysqli_connect("localhost", "root", "", "db");
        $this->setConnection($con);
    }
    public static function GetDataBase() {
        return mysqli_connect("localhost", "root", "", "db");
    }
}
