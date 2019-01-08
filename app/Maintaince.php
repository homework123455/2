<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintaince extends Model
{
    //
    protected $table = 'maintainces';
    protected $fillable = [
        'asset_id',
        'vendor_id',
        'date',
        'status',
        'method',
        'remark',
		'user_id',
		
    ];


    public function asset() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(Asset::class);
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
