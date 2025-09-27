<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventTeam extends Model
{
    protected $table = 'event_teams';
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function eventTeamMembers()
    {
        return $this->hasMany(EventTeamMember::class);
    }
}
