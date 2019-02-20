<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Cart;
use DB;



class CartController extends Controller
{


    public function index()
    {

        if (Auth::check()) {
            $all = 0;
            $data = DB::table('carts')
                ->where('users_id',Auth::user()->id)
                ->get();
            foreach ($data as $s){
                $all = $all + $s->total;
            }
            return view('cart',['carts' => $data,'a' =>$all]);
        }else{
            return redirect()->route('login');
        }


    }

    public function add($id)
    {
        if (Auth::check()) {
            $good = DB::table('goods')->where('id', $id)->value('goods_name2');
            $photo = DB::table('goods')->where('id', $id)->value('photo1');
            $price = DB::table('goods')->where('id', $id)->value('price');
            DB::table('carts')->insert(
                [
                    'photo' => $photo,
                    'product' => $good,
                    'cost' => $price,
                    'total' => $price,
                    'users_id' => Auth::user()->id
                ]
            );
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
