<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    //
    protected $table = 'lendings';
    protected $fillable = [
        'user_id',
        'place_id',
        'lenttime',
        'returntime',
    ];

    public function Place() // Lending (n) -> Place (1)
    {
        return $this->belongsTo(Place::class);
    }

    public function User() // Lending (n) -> User (1)
    {
        return $this->belongsTo(User::class);
    }

}
