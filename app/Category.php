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

    public function assets() // Category (1) -> Asset (n)
    {
        return $this->hasMany(Asset::class);
    }

}
