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

		'photo1',
		'photo2',
		'photo3',

		'vip'

        
    ];
    public function user() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(User::class);
    }
}

