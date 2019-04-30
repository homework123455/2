<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Good;
use DB;
use App\Cart;
use App\Order;
use App\Setting;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
class CheckoutController extends Controller
{
    public function store(Request $request)
    {
		$low_prices =Setting::where('id','1')->value('low_prices');
		$good =Good::all();
		$all = 0;
		$i=0;
		 $data = DB::table('carts')
                ->where('users_id',Auth::user()->id)
                ->get();
            foreach ($data as $s){
                $all = $all + $s->total;
				$i = $i + $s->total;
            }
			
		if(Auth::user()->vip ==1){
       
	      Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'postcode' => $request->postcode,
			'ph_number'=>$request->ph_number,
			'car_money'=>0,
			'vip_check'=>1
            
        ]);
		}
		elseif(Auth::user()->vip ==0&&$i>$low_prices){
		
	      Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'postcode' => $request->postcode,
			'ph_number'=>$request->ph_number,
			'car_money'=>0,
			'vip_check'=>0
            
        ]);
		}
		elseif(Auth::user()->vip==0&&$i<$low_prices){
		
	       Order::create([
            'name' => $request->name,
            'address' => $request->address,
            'postcode' => $request->postcode,
			'ph_number'=>$request->ph_number,
			'car_money'=>1,
			'vip_check'=>0
            
        ]);
		}

		
        $count =  DB::table('orders')->orderby('id','Desc')->value('id');
        DB::table('orders')->where('users_id',null)->update(
            [
                'users_id'=>Auth::user()->id,
				'status'=>"未處理",
				'created_at'=>Carbon::now(),
            ]
        );
		
        while 
		($row = Cart::where('users_id',Auth::user()->id)->first() != null){
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
					
                ] );
			
			
           
			$level = DB::table('users')->where('id', Auth::user()->id)->value('level');
		DB::table('users')
        ->where('id', Auth::user()->id)
        ->update([
            'level' =>$level+$cart->total,
			
        ]);
		$level1 = DB::table('users')->where('id', Auth::user()->id)->value('level');
		$vip=Setting::where('id',1)->value('vip');
		if($level1>$vip){
			DB::table('users')
        ->where('id', Auth::user()->id)
        ->update([
            'vip' => 1,
			'vip_time'=>Carbon::now()
			
        ]);
		}
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
		$low_prices =Setting::where('id','1')->value('low_prices');
		$vip_discount=Setting::where('id',1)->value('vip_discount');
		$price=Setting::where('id',1)->value('prices');
		$low_price=Setting::where('id',1)->value('low_prices');
		$vip=User::where('id',Auth::user()->id)->value('vip');
        $all = 0;
		$q=0;
        $data = DB::table('carts')
            ->where('users_id', Auth::user()->id)
            ->get();
        foreach ($data as $s) {
            $all = $all + $s->total;
        }
		if($vip==0){
			$vip_all=0;
			if($all < $low_price){
				$qq=$low_price-$all;
				$all =$all + $price;
				$q = $price;
				
			}
			else
			{
			$all =$all;
			$q =0;
			}
			}
		elseif($vip==1){
			$all =$all;
			$vip_all=$all*$vip_discount/10;
			$q =0;	
			
			}
			
			
        return view('checkout', ['checkouts' => $data, 'a' => $all,'q'=>$q,'vip'=>$vip,'vip_all'=>$vip_all]);

    }

}
