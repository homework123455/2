<!DOCTYPE html>
<html lang="en">
@extends('layouts.master')
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

    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">
        @foreach($goods as $good)
        <!-- Single Product Thumb -->
        <div class="single_product_thumb d-flex justify-content-center">
            
            
            <img src="../img/product-img/{{$good->photo1}}" alt="">
            
        </div>

       
        <!-- Single Product Description -->        
        <div class="single_product_desc clearfix">
                                           
            <span>{{$good->goods_name1}}</span>
                
            <h2>{{$good->goods_name2}}</h2>
                        
            
            
            <p class="product-price">${{$good->price}}</p>
            
        
            <!-- Form -->
            <form class="cart-form clearfix" method="post">

                <!-- table -->

                <div class="clearfix mr-50 mt-10 mb-30">
                <table class="table" border="5">
                <tr>
                　<td colspan="2" align="center">淨化室內空氣能力與維護管理難易度</td>
                </tr>
                <tr>
                　<td>單位葉面積之滯塵能力</td>
                  <td>{{$good->dust}}</td>
                </tr>
                <tr>
                　<td>降低二氧化碳能力</td>
                  <td>{{$good->cleanup_co2}}</td>
                </tr>
                <tr>
                　<td>揮發性有機污染物移除能力</td>
                  <td>{{$good->cleanup_organic}}</td>
                </tr>
                <tr>
                　<td colspan="2"  align="center">淨化揮發性有機污染物種類</td>
                </tr>
                <tr>
                　<td colspan="2"  align="center">{{$good->cleanup_type}}</td>
                </tr>
                <tr>
                　<td>蒸散作用速率</td>
                  <td>{{$good->spread}}</td>
                </tr>
                <tr>
                　<td>維護管理容易度</td>
                  <td>{{$good->manage}}</td>
                </tr>
                </table>
                </div>
                
                
                
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->
                    <div class="add-to-cart-btn">
                        <a href="{{route('cart.add',['id'=>$good->id])}}" class="btn essence-btn">Add to Cart</a>
                    </div>
                    <tr>
                　    <td>庫存量：{{$good->stock}}</td>
                    </tr>
                </div>
                
            </form>
        </div>
        <!-- Single Product Description -->


        <div class="single_product_desc clearfix"> 

            <img src="../img/introduction-img/{{$good->introduction_img1}}" alt="">

        </div>
                                               
        <div class="single_product_desc clearfix">                                         
            
            <p class="product-desc d-flex mb-30">{{$good->style}}</p>
            <p class="product-desc d-flex mb-30">{{$good->size}}</p>         
                   
        </div>        
            
        <div class="single_product_desc clearfix">

            <p class="product-desc d-flex mb-30">{{$good->output}}</p>
            <p class="product-desc d-flex mb-30">{{$good->bug}}</p>
        
            
        </div>

        <div class="single_product_desc clearfix">
                                           
        <img src="../img/introduction-img/{{$good->introduction_img2}}" alt="">
                                
        </div>    

    </section>
    <!-- ##### Single Product Details Area End ##### -->
@endforeach

</body>

</html>