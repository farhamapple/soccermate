<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityMember extends Model
{
    protected $table = 'community_members';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    // Add relathionships to Event, EventTeamMember, and EventWaitinglist
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function eventTeamMembers()
    {
        return $this->hasMany(EventTeamMember::class);
    }

    public function eventWaitinglists()
    {
        return $this->hasMany(EventWaitinglist::class);
    }
}
