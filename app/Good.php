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
		'value',
        
        'goods_name2',
        'photo1',

		'details',
		'details2',
		'details3',
'supplier_id',
		'photo2',
		'photo3',
		'photo4',
		'status'


    ];

    public function plants()
    {
        return $this->hasMany('App\Plant');
    }
	public function suppliers() //  Place (n) -> Category (1)
    {
        return $this->belongsTo(Supplier::class);
    }
}
