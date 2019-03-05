<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintaince extends Model
{
    //
    protected $table = 'maintainces';
    protected $fillable = [
        'place_id',
        'vendor_id',
        'date',
        'status',
        'method',
        'remark',
        'reason',
		'reason1',
		'user_id'
		
    ];



   

    public function place() // Maintaince (n) -> place (1)

    {
        return $this->belongsTo(Place::class);
    }
////////////
	public function user() // Application (n) -> User (1)
    {
        return $this->belongsTo(User::class);
    }
/////////////////
    public function applications() //  Maintaince (1) -> Application (n)
    {
        return $this->hasMany(Application::class);
    }

    public function maintainceitems() //  Maintaince (1) -> MaintainceItem (n)
    {
        return $this->hasMany(MaintainceItem::class);
    }




}
