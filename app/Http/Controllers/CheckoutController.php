<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Good;
use DB;
use App\Cart;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class CheckoutController extends Controller
{
    public function store(Request $request)
    {
		$good =Good::all();
		
        Order::create($request->all());
		
        $count =  DB::table('orders')->orderby('id','Desc')->value('id');
        DB::table('orders')->where('users_id',null)->update(
            [
                'users_id'=>Auth::user()->id,
				'status'=>"未處理",
				'created_at'=>Carbon::now(),
            ]
        );
        while ($row = Cart::where('users_id',Auth::user()->id)->first() != null){
            $cart = Cart::where('users_id',Auth::user()->id)->first();
			foreach($good as $good1){
				if($cart->product==$good1->name){
					$product_id=$good1->id;
				}
			}
            DB::table('ordersdetail')->insert(
                [
                    'qty' => $cart->qty,
                    'product' => $cart->product,
                    'cost' => $cart->cost,
                    'total' => $cart->total,
                    'users_id' => Auth::user()->id,
                    'orders_id' => $count,
					'product_id'=>$product_id
					
                ]
			
            );
			$stock=Good::where('name',$cart->product)->get()->first();
			//$result = $stock->stock-$cart->qty;
			/*DB::table('goods')->where('name',$cart->product)->update(
			[
			'stock'=>$result
			]);*/
			
			
            Cart::where('users_id',Auth::user()->id)->first()->delete();
        }
        return redirect()->route('main.shop');
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
