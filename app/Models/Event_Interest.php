<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

<<<<<<<< HEAD:app/Models/Meetup_Interest.php
class Meetup_Interest extends Model
{
    protected $table= 'meetups_interests';
========
class Event_Interest extends Model
{
    protected $table= 'events_interests';
>>>>>>>> main:app/Models/Event_Interest.php

    public $timestamps = false;
}
