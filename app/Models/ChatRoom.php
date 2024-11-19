<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $table= 'chatRooms';

    public $timestamps = false;

    public function getComputedNameAttribute()
    {
        $other_users = User::query()->join('chatRooms_users', 'users.id', '=', 'chatRooms_users.id_user')->where('id_chatRoom', '=', $this->id)->where('id_user', '!=', auth()->user()->id)->get();

        if ($this->name == null) {

            if ($other_users->count() == 1) {
                return $other_users->first()->full_name;
            }

            return implode(', ', $other_users->pluck('full_name')->toArray());
        }
        return $this->name . ' ' . $this->last_name;
    }
}
