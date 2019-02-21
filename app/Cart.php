<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table ='carts';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
