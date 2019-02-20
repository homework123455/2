<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Plant;

class Good extends Model
{
    protected $table ='goods';

    public function plants()
    {
        return $this->hasMany('App\Plant');
    }
}
