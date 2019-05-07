<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Cart;
use DB;
use App\Good;
use App\Setting;
use App\User;
use Carbon\Carbon;
class CartController extends Controller
{


    public function index()
    {
	$vip_discount=Setting::where('id',1)->value('vip_discount');
     $price=Setting::where('id',1)->value('prices');
	 $low_price=Setting::where('id',1)->value('low_prices');
	 if(Auth::check()){
	 $vip=User::where('id',Auth::user()->id)->value('vip');
	 $vip_time=User::where('id',Auth::user()->id)->value('vip_time');
	 $vip_time1=Carbon::parse($vip_time)->addDays(30)->format('Y-m-d');
	 }
        if (Auth::check()) {
			$good=Good::all();
            $all = 0;
			$q = 0;
			$qq =0;
			$i=0;
			
			$abc=10;
            $data = DB::table('carts')
                ->where('users_id',Auth::user()->id)
                ->get();
            foreach ($data as $s){
                $all = $all + $s->total;
				$i = $i + $s->total;
            }

		if($vip==0){
			$vip_all=0;
			if($all < $low_price){

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
			$abc=($abc-$vip_discount)*10;
			if($all < $low_price){
			$q =$price;	
			$all =$all+$q;
			$vip_all=ceil($all*$vip_discount/10);
			
			}
			else
			{
				$all=$all;
				$q=0;
				$vip_all=ceil($all*$vip_discount/10);
			}
			}
			
            return view('cart',['low_price'=>$low_price,'carts' => $data,'abc' =>$abc,'a' =>$all,'goods'=>$good,'q'=>$q,'b'=>$i,'vip_all'=>$vip_all,'vip'=>$vip,'vip_time1'=>$vip_time1,'vip_discount'=>$vip_discount]);
        }else{
            return redirect()->route('login');
        }


    }

    public function add($id)
    {
        if (Auth::check()) {
            $good = DB::table('goods')->where('id', $id)->value('name');
            $photo = DB::table('goods')->where('id', $id)->value('photo1');
            $price = DB::table('goods')->where('id', $id)->value('price');
			$cart = DB::table('carts')->where('product',$good)->where('users_id',Auth::user()->id)->get()->first();
			if(empty($cart)){
            DB::table('carts')->insert(
                [
                    'photo' => $photo,
                    'product' => $good,
					'product_id'=>$id,
                    'cost' => $price,
                    'total' => $price,
                    'users_id' => Auth::user()->id
                ]
            );
			
			}
			else{
			DB::table('carts')->where('product',$good)->update(
			[
			'qty'=>$cart->qty+1,
			
			]);
			$total =DB::table('carts')->where('product',$good)->value('qty');;
				DB::table('carts')->where('product',$good)->update(
			[
			'total'=>$total * $cart->cost,
			
			]);
				
			}
			
            return Redirect::to(url()->previous());
        }else{
            return redirect()->route('login');
        }

    }

    public function update($id,$q)
    {
        $cost = DB::table('carts')->where('id', $id)->value('cost');
        DB::table('carts')
        ->where('id', $id)
        ->update([
            'qty' => $q,
            'total' => $cost * $q
        ]);

		
        return redirect()->route('cart');

    }


    public function delete($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart');
    }

}
