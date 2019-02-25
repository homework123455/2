<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use App\Plant;
use DB;

class ShopDetailController extends Controller
{
    public function index($id)
    {
		
		$data = Good::where('id',$id)
		->get();
		$i =1;
		$stock =Good::where('id',$id)->value('value');
		/*
        $data = DB::table('goods')
        ->join('plants', 'goods.id', '=', 'plants.goods_id')
        ->where('plants.id',$id)
        ->get();*/
        return view('single-product-details', ['goods' => $data,'stocks'=>$stock,'i'=>$i]);
    }

    public function show()
    {
        $data = Good::where('id',1)->get();
        return view('single-product-details',['goods' => $data]);
    }
    
}