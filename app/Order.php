<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{

    protected $table ='orders';

    public function User()
    {
    return $this->belongsTo('app\User');
    }
    public function carts()
    {
        return $this->hasMany('app\Cart');
    }
      protected  $fillable=[
     'id','name', 'postcode', 'ph_number', 'address', 'created_at', 'updated_at','status','reason','reason1','vip_check','car_money','buytime'
];



}
