<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Plant;

class Good extends Model
{
    protected $table ='goods';
	protected $fillable = [
        
        'category',
		
        
        'price',
        'stock',
        'goods_name1',
        'goods_name2',
        'photo1',
		'photo2'

    ];

    public function plants()
    {
        return $this->hasMany('App\Plant');
    }
}
