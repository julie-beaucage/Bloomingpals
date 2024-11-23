<?php

namespace App\Models;

use App\Models\Interest;
use App\Models\User_Interest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Cache;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

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
       $personality_type = DB::table('personalities')
            ->join('users', 'users.personality', '=', 'personalities.id')
            ->where('users.id', $this->id)
            ->select('personalities.type as personality_type')
            ->first();
    
        if ($personality_type) {
            return $personality_type->personality_type;
        } else {
            return 'Indéterminé'; 
        }
    }
    public function getPersonalityGroup()
    {
       $personality = DB::table('users')
            ->join('personalities', 'users.personality', '=', 'personalities.id')
            ->join('groups_personalities', 'groups_personalities.id', '=', 'personalities.group_perso')
            ->where('users.id', $this->id)
            ->select('groups_personalities.name as personality_name')
            ->first();
    
        if ($personality) {
            return $personality->personality_name;
        } else {
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
        
        $count = count($interests);
        $affinity = ($count == 0) ? 0 : $points / $count / 3;
        return $affinity;
    }

    public function calculateAffinity($otherUserId, $idUser) {
        $userPersonality = $this->getUserPersonality($idUser);
        $otherUserPersonality = $this->getUserPersonality($otherUserId);
    
        $personalityAffinity = 0;
        if ($userPersonality && $otherUserPersonality) {
            if ($userPersonality->type === $otherUserPersonality->type) {
                $personalityAffinity  = 1.0; 
            } elseif ($userPersonality->group_name === $otherUserPersonality->group_name) {
                $personalityAffinity  = 0.5; 
            }
        } 
        $userInterests = User_Interest::getInteretsParUtilisateur($idUser);
        $otherUserInterests = User_Interest::getInteretsParUtilisateur($otherUserId);
    
        $pointsUser1 = $this->calculateInterestPoints($userInterests, $otherUserInterests);
        $totalPointsUser1 = 2 * count($userInterests);
        if ($totalPointsUser1 == 0) {
            return 0;
        }
        $affinityUser1 = ($pointsUser1 / $totalPointsUser1) * 100;
        $finalAffinity = ($personalityAffinity* 0.5 + ($affinityUser1 / 100) * 0.5) * 100;
        return round($finalAffinity, 2);
    }
    
    private function calculateInterestPoints($userInterests, $otherUserInterests) {
        $points = 0;
        $otherUserInterestNames = array_column($otherUserInterests->toArray(), 'InterestName');
    
        foreach ($userInterests as $interest) {
            if (in_array($interest->InterestName, $otherUserInterestNames)) {
                $points += 2;
               // echo "Intérêt identique : " . $interest->InterestName . "\n"; // Ajout d'un log
            } else {
                foreach ($otherUserInterests as $otherInterest) {
                    if ($interest->categories === $otherInterest->categories) {
                        $points += 1;
                       // echo "Intérêt dans la même catégorie : " . $interest->InterestName . "\n"; // Ajout d'un log
                        break;
                    }
                }
            }
        }
    
        return $points;
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}