<?php

namespace App\Models;

use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }
    public function getUserPersonality($userId)
    {
        return DB::table('users')
            ->select('users.personality', 'personalities.type', 'personalities.name', 'personalities.nameDescription')
            ->join('personalities', 'users.personality', '=', 'personalities.id')
            ->where('users.id', $userId)
            ->first(); // Récupère le premier résultat
    }
    

}