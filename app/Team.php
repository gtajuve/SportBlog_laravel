<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    public $timestamps=false;
    protected $fillable = array('team_name', 'image', 'address','country_id');
    public function players()
    {
        return $this->hasMany('App\Player');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function user()
    {
        return $this->belongsToMany('App\User','user_teams');
    }
}
