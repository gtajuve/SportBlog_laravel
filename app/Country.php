<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    public function teams()
    {
        return $this->hasMany('App\Team');
    }
}
