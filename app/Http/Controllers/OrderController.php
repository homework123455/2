<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrdersDetail;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $order = Order::where('users_id',Auth::user()->id)->get();
        $ordersdetail = OrdersDetail::where('users_id',Auth::user()->id)->get();
        return view('home',['orders' => $order,'ordersdetails' => $ordersdetail]);

    }


}
