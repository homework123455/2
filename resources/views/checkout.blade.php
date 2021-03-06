<!DOCTYPE html>
@extends('layouts.master')
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="chrome">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags must come first in the head; any other head content must come after these tags -->

    <!-- Title  -->
    <title>體育用品系統</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/plant.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="../style.css">
<link href="{{ asset('css/style2.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/bootstrap2.min.css') }}" rel="stylesheet">
</head>

<body>



<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">
<div class="container"> 
    <ul class="nav nav-pills nav-justified step step-arrow"> 
        <li style="width:320px;"> 
            <a href="{{ route('main.shop') }}">購買商品</a> 
        </li> 
        <li style="width:320px;"> 
            <a href="{{ route('cart') }}">確認購買內容</a> 
        </li> 
        <li style="width:320px;"> 
            <a>填寫基本資料</a> 
        </li> 
       
    </ul> 
 
 
</div>
            <div class="col-12 col-md-6">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-page-heading mb-30">
                        <h5>帳單地址</h5>
                    </div>

                    <form action="/orders" method="post"role="form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 mb-3">

                                <label for="name">收件人姓名<span>*</span></label>
                                <input type="text" class="form-control" name="name" maxlength="8" value="{{Auth::user()->name}}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="address">地址 <span>*</span></label>
                                <input type="text" class="form-control mb-3" name="address" maxlength="35" value="{{Auth::user()->address}}" required>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postcode">郵遞區號 <span>*</span></label>
                                <input type="text" class="form-control" name="postcode" maxlength="5" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ph_number">電話號碼 <span>*</span></label>
                                <input type="text" class="form-control" name="ph_number" min="0" maxlength="10" value="{{Auth::user()->phone}}" required>
                            </div>
                            <div class="container" align="center">
                                <button type="submit" class="btn essence-btn">結帳</button>
                            </div>
                            <div class="col-12">

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">

                    <div class="cart-page-heading">
                        <h5>訂單明細</h5>
                    </div>


                        <div class="clearfix">
                            <table class="table" >

                                <tr>
                                    <td align="left">商品</td>
                                    <td align="center">單價</td>
                                    <td align="center">數量</td>
                                    <td align="right">總計</td>
                                </tr>

                        @foreach($checkouts as $checkout)
						
                                 <tr>
                                  　<td align="left">{{$checkout->product}}</td>
                                    <td align="center">{{$checkout->cost}}</td>
                                    <td align="center">{{$checkout->qty}}</td>
                                    <td align="right">{{$checkout->total}}</td>
                                 </tr>

                        @endforeach
						
                            </table>
                        </div>

@if($vip==1)
				<h6>運費：$<?php echo $q ?>
                    <h6>總金額 : $<?php echo $a; ?></h6>
				 <h6>折扣後金額: $<?php echo $vip_all; ?></h6>
				@else
					運費：$<?php echo $q;?>
					   <h6>總金額 : $<?php echo $a; ?></h6>
 @endif
                </div>
            </div>

        </div>
    </div>
</div>
<!-- ##### Checkout Area End ##### -->



</body>

<div class="clearfix mr-50 mt-50 mb-50">
</div>
</html>
<script src="{{ asset('js/jquery2.min.js') }}"></script>
	 <script src="{{ asset('js/lib.js') }}"></script>
<script type="text/javascript"> 
$(function() { 
    bsStep(2)/bsStep(3); 
    //bsStep(i) i 为number 可定位到第几步 如bsStep(2)/bsStep(3) 
}) 
</script>