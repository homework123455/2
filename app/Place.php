<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //資產
    protected $table = 'places';
    protected $fillable = [
        'name',
        'category',
		
        
        'status',
        'keeper',
        'lendable',
        'location',
        'remark',
		'lendname',

		'week_id',
		'time_id',

        'file',
        'file1'

		
       // 'vendor',
        //'warranty'
    ];

    public function category() //  Place (n) -> Category (1)
    {
        return $this->belongsTo(Category::class);
    }
	public function week() //  Place (n) -> Category (1)
    {
        return $this->belongsTo(Week::class);
    }
	public function time_() //  Place (n) -> Category (1)
    {
        return $this->belongsTo(Time_::class);
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
