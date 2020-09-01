<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'about', 'user_id', 'game_category_id'];


    public function game()
    {
        return $this->belongsTo(Games::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getTeamId($name){
        $getTeamId = Team::select('id')->where('name',$name)->first();
        return $getTeamId->id;
    }
}
