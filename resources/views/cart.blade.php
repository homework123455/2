<!DOCTYPE HTML>
@extends('layouts.master')
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>室內植物盆栽訂購系統</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/plant.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
	<div class="breadcumb_area bg-img" style="background-image: url(../img/core-img/cartbp.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>cart</h2>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<div class="clearfix mr-50 mt-50 mb-50">
	</div>
	<div class="clearfix mr-50 mt-50 mb-50">
	</div>
    @if(count($carts)<1)
        <center>
        <h2>Nothing in Cart!</h2>
        </center>
    @else
		<center>
		<table>
        <tr>
        <td width="200" align="center" valign="center">
			<div class="product-left">
			    <h5></h5>
			</div>
		</td>
		<td width="250" align="center" valign="center">
			<div class="product-right">
				<h5>Product Name</h5>
			</div>
		</td>
		<td width="20" align="center" valign="center">
				<h5>Prcie</h5>
		</td>
		<td width="50" align="center" valign="center">
			<div class="product-right1">
			    <h5>Quantity</h5>
			</div>
		</td>
		<td width="5" align="center" valign="center">
			<div class="product-right1">
			    <h5></h5>
			</div>
		</td>
		<td width="200" align="center" valign="center">
			<div class="product-right1">
			    <h5>Total</h5>
			</div>
		</td>
		<td width="200" align="center" valign="center">
			
		</td>
		</tr>
		@foreach ($carts as $cart)
        <tr >
        <td width="200" align="center" valign="center">
			<div class="product-left">
				<img src="../img/product-img/{{$cart->photo}}">
			</div>
		</td>
		<td width="250" align="center" valign="center">
			<div class="product-right">
				<h6>{{$cart->product}}</h6>

			</div>
		</td>
		<td width="200" align="center" valign="center">
			<div class="product-right1">
				<h6>$ {{$cart->cost}}</h6>
				<div class="close"> </div>
			</div>
		</td>
		<td width="50" align="center" valign="center">
			<div class="product-right1">
			    <h6>{{$cart->qty}}</h6>
			</div>
		</td>
		<td width="5" align="center" valign="center">
			<div class="product-right1">
				<select name="qty" onchange="javascript:location.href=this.value;">
					<option value="">數量修改</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'1'])}}">1</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'2'])}}">2</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'3'])}}">3</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'4'])}}">4</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'5'])}}">5</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'6'])}}">6</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'7'])}}">7</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'8'])}}">8</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'9'])}}">9</option>
					<option value="{{route('cart.update',['id'=>$cart->id,'q'=>'10'])}}">10</option>
				</select>
            </div>
		</td>
		<td width="200" align="center" valign="center">
			<div class="product-right1">
				<h6>$ {{($cart->total)}}</h6>
				<div class="close"> </div>
			</div>

		</td>
		<td width="200" align="center" valign="center">
			<div class="clear">
                <form action="{{ route('cart.delete', $cart->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-link"><img src="{{asset('/img/core-img/close.png')}}"></button>
                </form>
             </div>
		</td>
		</tr>
		@endforeach
		</table>
			<h3>結帳總金額 : $ <?php echo $a; ?></h3>
			<div class="add-to-cart-btn">
				<a href="{{route('checkout')}}" class="btn essence-btn">下單</a>
			</div>




    @endif
	<div class="clearfix mr-50 mt-50 mb-50">
	</div>
	<div class="clearfix mr-50 mt-50 mb-50">
	</div>
</body>
</html>