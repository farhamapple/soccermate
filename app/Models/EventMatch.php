<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventMatch extends Model
{
    protected $table = 'event_matches';
    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function homeTeam()
    {
        return $this->belongsTo(EventTeam::class, 'home_team_id');
    }
    public function awayTeam()
    {
        return $this->belongsTo(EventTeam::class, 'away_team_id');
    }
}
