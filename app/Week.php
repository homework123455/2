<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    //資產
    protected $table = 'weeks';
    protected $fillable = [
        
		'week',
		
		
       // 'vendor',
        //'warranty'
    ];
 public function applications() //  Maintaince (1) -> Application (n)
    {
        return $this->hasMany(Application::class);
    }
    public function place() // Maintaince (n) -> place (1)
    {
        return $this->belongsTo(Place::class);
    }

    public function maintainces() //  Place (1) -> Maintaince (n)
    {
        return $this->hasMany(Maintaince::class);
    }


    public function user() // Place (n) ->User (1)
    {
        return $this->belongsTo(User::class);
    }

    public function lendings() //  Place (1) -> Lending (n)
    {
        return $this->hasMany(Lending::class);
    }
}
