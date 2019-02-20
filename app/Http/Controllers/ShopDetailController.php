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
        $data = DB::table('goods')
        ->join('plants', 'goods.id', '=', 'plants.goods_id')
        ->where('plants.id',$id)
        ->get();
        return view('single-product-details', ['goods' => $data]);
    }

    public function show()
    {
        $data = Good::where('id',1)->get();
        return view('single-product-details',['goods' => $data]);
    }
    
}