<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    public $timestamps = true;

    public function conditions()
    {
        return $this->belongsToMany('App\Condition', 'price_conditions')->withTimestamps();
    }
}
