<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    //
    protected $table = 'supplies';
    protected $fillable = [
        'name',
        'quantity',
    ];


    public function receives()
    {
        return $this->hasMany(Receive::class);
    }
}
