<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Cart;
use DB;
use App\Good;



class CartController extends Controller
{


    public function index()
    {

        if (Auth::check()) {
			$good=Good::all();
            $all = 0;
			$q = 0;
            $data = DB::table('carts')
                ->where('users_id',Auth::user()->id)
                ->get();
            foreach ($data as $s){
                $all = $all + $s->total;
            }
			if($all < '299'){
				$all =$all + 60;
				$q = 60;
			}else{
			$all =$all+30;
			$q =30;
			}
            return view('cart',['carts' => $data,'a' =>$all,'goods'=>$good,'q'=>$q]);
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
