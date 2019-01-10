<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time_ extends Model
{
    //資產
    protected $table = 'times';
    protected $fillable = [
        
		'time_start',
		'time_end'
		
       // 'vendor',
        //'warranty'
    ];
 public function applications() //  Maintaince (1) -> Application (n)
    {
        return $this->hasMany(Application::class);
    }
    public function asset() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(Asset::class);
    }

    public function maintainces() //  Asset (1) -> Maintaince (n)
    {
        return $this->hasMany(Maintaince::class);
    }


    public function user() // Asset (n) ->User (1)
    {
        return $this->belongsTo(User::class);
    }

    public function lendings() //  Asset (1) -> Lending (n)
    {
        return $this->hasMany(Lending::class);
    }
}
