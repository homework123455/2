<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Plant;

class Suppliersdetail extends Model
{
    protected $table ='suppliersdetail';
	protected $fillable = [
        'name',
        
        
        'price',
       
		'value',
      
        'supplier_id',
		


    ];

   
	public function suppliers() //  Place (n) -> Category (1)
    {
        return $this->belongsTo(Supplier::class);
    }
}
