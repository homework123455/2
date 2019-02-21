<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New_ extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'user_id',
        'title',
        'content1',
		'content2',
		'content3',
		'content4',
		'photo',
        
    ];
}
