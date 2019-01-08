<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $table = 'applications';
    protected $fillable = [
        'user_id',
        'maintaince_id',
        'problem',
        'date'
    ];

    public function maintaince() // Application (n) -> Maintaince (1)
    {
        return $this->belongsTo(Maintaince::class);
    }

    public function user()   // Application (n) -> User (1)
    {
        return $this->belongsTo(User::class);
    }

}
