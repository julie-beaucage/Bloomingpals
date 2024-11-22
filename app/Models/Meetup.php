<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag_Meetup;
use App\Models\Meetup_Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Cache;

class Meetup extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table= 'meetups';
    protected $primaryKey = 'id';
    public static function getMeetupsByOwner($userId)
    {
        return self::where('id_owner', $userId)->get();
    }
 
    public function participants()
    {
        return $this->belongsToMany(User::class, 'meetups_users', 'id_meetup', 'id_user');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'id_owner');
    }

    public function isParticipating($userId)
    {
        return $this->participants()->where('id_user', $userId)->exists();
    }
    public function interestedUsers()
    {
        return $this->belongsToMany(User::class, 'meetups_requests', 'id_meetup', 'id_user')->where('status', 'pending');
    }

    public function isExpired()
    {
        $today = Carbon::today();
        return $this->date < $today; 
    }
    public function requests()
    {
        return $this->hasMany(Meetup_Request::class, 'id_meetup');
    }
    public function isRequestSend($userId, $meetupId)
    {
        $request = DB::table('meetups_requests')
            ->where('id_user', $userId)
            ->where('id_meetup', $meetupId)
            ->first();
    
        if ($request) {
            return $request->status;
        }
    
        return 'none';
    }
    
    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'meetups_interests', 'id_meetup', 'id_interest');
    }



    /**
     * /
     * @param mixed $id meetup id
     * @return array
     */
    public static function GetTags($id) {
        $tags = [];
        foreach (Tag_Meetup::where("id_meetup", $id)->get() as $tag_rencontre) {
            $tag = Tag::where("id", $tag_rencontre->id_tags)->get();
            array_push($tags, $tag);
        }
        return $tags;
    }

    /**
     * /
     * @param mixed $id meetup id
     * @return array
     */
    public static function GetParticipants($meetupId) {
        $users = [];
        $participants = Meetup_User::where("id_meetup", $meetupId)->get();
        if ($participants->count() > 0) {
            foreach ($participants as $recontre_utilisateur) {
                $user = User::where("id", $recontre_utilisateur->id_user)->get()[0];
                array_push($users, $user);
            }
        }
        return $users;
    }
    /**
     * /
     * @param mixed $id meetup id
     * @return user[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function GetOrganisator($meetupId) {
        $rencontre = Meetup::where("id", $meetupId)->get()->first();
        $organisator = User::where("id", $rencontre->id_owner)->get()->first();
        return $organisator;
    }

    public static function RemoveParticipant($userId, $meetupId) {

    }
    /**
     * Summary of GetEventsFromUser
     * @param mixed $userId
     * @return Meetup_User[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function GetMeetupsFromUser($userId) {
        $rencontresJoined = Meetup_User::where("id_user", $userId)->join("meetups", "meetups.id", "=", "meetups_users.id_meetup")->orderBy("meetups.date", 'DESC')->get();
        return $rencontresJoined;
    }
}
