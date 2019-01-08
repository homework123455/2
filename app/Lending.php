<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    //
    protected $table = 'lendings';
    protected $fillable = [
        'user_id',
        'asset_id',
        'lenttime',
        'returntime',
    ];

    public function Asset() // Lending (n) -> Asset (1)
    {
        return $this->belongsTo(Asset::class);
    }

    public function User() // Lending (n) -> User (1)
    {
        return $this->belongsTo(User::class);
    }

}
