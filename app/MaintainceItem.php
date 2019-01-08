<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintainceItem extends Model
{
    //
    protected $table = 'maintainceitems';
    protected $fillable = [
        'maintaince_id',
        'name',
        'amount'
    ];

    public function Maintaince() // MaintainceItem (n) ->Maintaince (1)
    {
        return $this->belongsTo(Maintaince::class);
    }

}
