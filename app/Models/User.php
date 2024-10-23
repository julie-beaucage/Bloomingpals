<?php

namespace App\Models;

use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


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
        ->select(
            'users.personality', 
            'personalities.type', 
            'personalities.name', 
            'personalities.nameDescription', 
            'groups_personalities.name as group_name'
        )
        ->join('personalities', 'users.personality', '=', 'personalities.id')
        ->join('groups_personalities', 'personalities.group_perso', '=', 'groups_personalities.id')
        ->where('users.id', $userId)
        ->first();
    
    }
    public function getPersonalityType()
    {
        $personality = DB::table('users')
            ->join('personalities', 'users.personality', '=', 'personalities.id')
            ->join('groups_personalities', 'groups_personalities.id', '=', 'personalities.group_perso')
            ->where('users.id', $this->id)
            ->select('groups_personalities.name as personality_name')
            ->first();

        Log::info('Personality type for user ID ' . $this->id . ': ', [
            'personality' => $personality
        ]);
    
        if ($personality) {
            return $personality->personality_name;
        } else {
            Log::warning('No personality found for user ID ' . $this->id);
            return 'default-class'; 
        }
    }
    

}