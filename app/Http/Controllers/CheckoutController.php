<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

use DB;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        Order::create($request->all());
        $count =  DB::table('orders')->orderby('id','Desc')->value('id');
        DB::table('orders')->where('users_id',null)->update(
            [
                'users_id'=>Auth::user()->id,
            ]
        );
        while ($row = Cart::where('users_id',Auth::user()->id)->first() != null){
            $cart = Cart::where('users_id',Auth::user()->id)->first();
            DB::table('ordersdetail')->insert(
                [
                    'qty' => $cart->qty,
                    'product' => $cart->product,
                    'cost' => $cart->cost,
                    'total' => $cart->total,
                    'users_id' => Auth::user()->id,
                    'orders_id' => $count
                ]
            );
            Cart::where('users_id',Auth::user()->id)->first()->delete();
        }
        return redirect()->route('main.user');
    }

    public function cartdetail()
    {
        $all = 0;
        $data = DB::table('carts')
            ->where('users_id', Auth::user()->id)
            ->get();
        foreach ($data as $s) {
            $all = $all + $s->total;
        }
        return view('checkout', ['checkouts' => $data, 'a' => $all]);

    }

}
