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
        'date',
        'cost',
        'status',
        'keeper',
        'lendable',
        'location',
        'remark',
		'lendname',
        'file',
        'file1'
		
       // 'vendor',
        //'warranty'
    ];

    public function category() //  Asset (n) -> Category (1)
    {
        return $this->belongsTo(Category::class);
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
