<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    public $timestamps=false;
    protected $fillable = array('first_name', 'last_name', 'country','image','games','goals','position_player','team_id');

    public function team()
    {
        return $this->belongsTo('App\Team');
    }
    public function game()
    {
        return $this->belongsToMany('App\Game','games_players');
    }
}
