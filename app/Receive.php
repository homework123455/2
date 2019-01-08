<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    //
    protected $table = 'receives';
    protected $fillable = [
        'user_id',
        'supply_id',
        'date',
        'quantity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class);
    }

}


