<?php

namespace App\Models;

use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }
    public function broadcastOn(): Channel{
        return new PrivateChannel('user'.$this->id);
    }
    

}