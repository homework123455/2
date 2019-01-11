<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //資產
    protected $table = 'assets';
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

    public function category() //  Asset (n) -> Category (1)
    {
        return $this->belongsTo(Category::class);
    }
	public function week() //  Asset (n) -> Category (1)
    {
        return $this->belongsTo(Week::class);
    }
	public function time_() //  Asset (n) -> Category (1)
    {
        return $this->belongsTo(Time_::class);
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
