<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderBack extends Model
{
   protected $table = 'orderback';
    protected $fillable = [
        'order_id',
        'good_id',
		'reason'
		
        
    ];
}
