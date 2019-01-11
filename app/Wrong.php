<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wrong extends Model
{
    protected $table = 'wrongs';
    protected $fillable = [
        'user_id',
        'wrongname',
        'date'
    ];
    public function user() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(User::class);
    }
}

