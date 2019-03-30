<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Suppliersdetail extends Model
{
    protected $table ='suppliersdetail';
	protected $fillable = [
        'name',
        
        
        'price',
       
		'value',
      
        'supplier_id',
		'checked'


    ];

   
	public function suppliers() //  Place (n) -> Category (1)
    {
        return $this->belongsTo(Supplier::class);
    }
}
