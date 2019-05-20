<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table ='report';
	protected  $fillable=[
     'id','good_id','created_at','earn','trade'
];
}
