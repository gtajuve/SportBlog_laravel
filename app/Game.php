<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function hometeam()
    {
        return $this->belongsTo('App\Team','home_team_id');
    }
    public function awayteam()
    {
        return $this->belongsTo('App\Team','away_team_id');
    }
    public function player()
    {
        return $this->belongsToMany('App\Player','games_players');
    }
}
