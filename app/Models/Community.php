<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'communities';
    protected $guarded = ['id'];

    public function communityMembers()
    {
        return $this->hasMany(CommunityMember::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
