<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Plant;

class Good extends Model
{
    protected $table ='goods';
	protected $fillable = [
        'name',
        'category',
		
        
        'price',
        'stock',
        
        'goods_name2',
        'photo1',

		'details',
		'details2',
		'details3',

		'photo2',
		'photo3',
		'photo4'


    ];

    public function plants()
    {
        return $this->hasMany('App\Plant');
    }
}
