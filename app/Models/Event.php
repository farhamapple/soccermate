<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $guarded = ['id'];

    public function eventTeams()
    {
        return $this->hasMany(EventTeam::class);
    }

    public function eventMatches()
    {
        return $this->hasMany(EventMatch::class);
    }

    public function eventWaitinglists()
    {
        return $this->hasMany(EventWaitinglist::class);
    }

    public function eventTeamMembers()
    {
        return $this->hasManyThrough(EventTeamMember::class, EventTeam::class);
    }

    // Add relationship to CommunityMember And Community
    // public function communityMember()
    // {
    //     return $this->belongsTo(CommunityMember::class);
    // }
    public function community()
    {
        return $this->belongsTo(Community::class);
    }
}
