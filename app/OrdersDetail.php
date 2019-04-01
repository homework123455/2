<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    protected $table ='ordersdetail';
	protected  $fillable=[
     'id','orders_id', 'users_id', 'product', 'product_id', 'cost', 'qty',
	 'total','status','backreason','created_at','updated_at','backreason1'
];
}
