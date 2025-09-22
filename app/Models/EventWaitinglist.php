<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventWaitinglist extends Model
{
    protected $table = 'event_waitinglists';
    protected $guarded = ['id'];
}
