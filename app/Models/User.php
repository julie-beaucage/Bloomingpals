<?php

namespace App\Models;

use Auth;
use App\Models\Interest;
use App\Models\User_Interest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }
    
    public function affinity($interests_ids) {        
        $user_interests = User_Interest::select('users_interests.id_interest as id', 'categories_interests.id as id_category')
        ->join('interests', 'interests.id', '=', 'users_interests.id_interest')
        ->join('categories_interests', 'categories_interests.id', '=', 'interests.id_category')
        ->where('id_user', '=', $this->id)
        ->get();

        $interests = Interest::select('interests.id as id', 'categories_interests.id as id_category')
        ->join('categories_interests', 'categories_interests.id', '=', 'interests.id_category')
        ->whereIn('interests.id', $interests_ids)
        ->get();

        $points = 0;
        foreach ($user_interests as $user_interest) {
            $interest_points = 0;
            
            foreach ($interests as $interest) {

                if ($user_interest->id_category == $interest->id_category && $interest_points < 1)
                    $interest_points = 1;

                if ($user_interest->id == $interest->id)
                    $interest_points = 3;
            }

            $points += $interest_points;
        }
        
        $affinity = $points / count($user_interests) / 3;
        return $affinity;
    }
}