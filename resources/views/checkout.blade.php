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
    <title>室內植物盆栽訂購系統</title>

    <!-- Favicon  -->
    <link rel="icon" href="../img/core-img/plant.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../css/core-style.css">
    <link rel="stylesheet" href="../style.css">

</head>

<body>



<!-- ##### Checkout Area Start ##### -->
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">

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
                                <input type="text" class="form-control" name="name" maxlength="8" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="address">地址 <span>*</span></label>
                                <input type="text" class="form-control mb-3" name="address" maxlength="35" required>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postcode">郵遞區號 <span>*</span></label>
                                <input type="text" class="form-control" name="postcode" maxlength="5" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="ph_number">電話號碼 <span>*</span></label>
                                <input type="text" class="form-control" name="ph_number" min="0" maxlength="10" required>
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


                    <h6>總金額 : $<?php echo $a; ?></h6>

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