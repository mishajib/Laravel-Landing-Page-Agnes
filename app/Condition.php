<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public $timestamps = true;

    public function price(){
        return $this->belongsToMany('App\Price', 'price_conditions')->withTimestamps();
    }
}
