<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $fillable = ['name', 'about', 'user_id'];

    public function tournament()
    {
        return $this->hasMany(Tournament::class);
    }

    public function team()
    {
        return $this->hasMany(Team::class);
    }
}
