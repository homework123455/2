<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Monthly extends Model
{
    protected $table ='monthly';
	protected  $fillable=[
     'id','good_id','created_at','earn','month','trade'
];
}
