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
    public function calculateAffinity($otherUserId) {
        // 1. Calculer l'affinité de personnalité
        $userPersonality = $this->getUserPersonality($this->id);
        $otherUserPersonality = $this->getUserPersonality($otherUserId);
    
        $personalityAffinity = 0;
        if ($userPersonality && $otherUserPersonality) {
            if ($userPersonality->type === $otherUserPersonality->type) {
                $personalityAffinity = 1.0; // 100%
            } elseif ($userPersonality->group_name === $otherUserPersonality->group_name) {
                $personalityAffinity = 0.5; // 50%
            }
        }
    
        $otherUserInterests = DB::table('users_interests')
            ->where('id_user', $otherUserId)
            ->pluck('id_interest')
            ->toArray();
    
        $interestAffinity = $this->affinity($otherUserInterests);
    
        $finalAffinity = ($personalityAffinity * 0.5 + $interestAffinity * 0.5) * 100;
    
        return round($finalAffinity, 2) . '%';
    }
    
}