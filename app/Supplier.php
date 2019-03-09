<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
     protected $table = 'suppliers';
	 protected $fillable = [
        'name',
        'phone',
        'address'
    ];
	public function goods()
    {
        return $this->hasMany(Good::class);
    }
}
