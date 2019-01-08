<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $table = 'violation';

    protected $fillable = [
        'id',
        'name',
        'time',
    ];

   public function asset() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(Asset::class);
    }
////////////
	public function user() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(User::class);
    }
/////////////////
    public function applications() //  Maintaince (1) -> Application (n)
    {
        return $this->hasMany(Application::class);
    }

}
