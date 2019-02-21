<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie  extends Model
{
    //
    protected $table = 'Categories';
    protected $fillable = [
        'name',
		'created_at'
    ];

    public function places() // Category (1) -> Place (n)
    {
        return $this->hasMany(Place::class);
    }

}
