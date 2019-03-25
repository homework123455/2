<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $fillable = [
        'goods',
        'orders',
        
    ];
    public function user() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(User::class);
    }
}

