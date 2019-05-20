<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addstock extends Model
{
    protected $table ='addstock';
	protected  $fillable=[
     'id','value','created_at','supply_id','good_id'
];
}
