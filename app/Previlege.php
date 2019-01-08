<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Previlege extends Model
{
    //
    protected $table = 'previleges';
    protected $fillable = [
        'name'
    ];

    public function users() //  Previlege (1) -> User (n)
    {
        return $this->hasMany(User::class);
    }
}
