<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'Categories';
    protected $fillable = [
        'name'
    ];

    public function places() // Category (1) -> Place (n)
    {
        return $this->hasMany(Place::class);
    }

}
