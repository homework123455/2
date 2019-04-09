<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = [
        'goods',
        'orders',
		'prices',
		'low_prices',
<<<<<<< HEAD
		'photo1',
		'photo2',
		'photo3'
=======
		'vip'
>>>>>>> 5123ec303ffa1e291ef0236b2232293855f163eb
        
    ];
    public function user() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(User::class);
    }
}

