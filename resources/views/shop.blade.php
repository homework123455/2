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
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url(../img/bg-img/test2.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Plant</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="shop_sidebar_area">

                        <!-- ##### Single Widget ##### -->
                        <div class="widget catagory mb-50">
                            <!-- Widget Title -->
                            <h6 class="widget-title mb-30">分類</h6>

                            <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a>淨化能力</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="{{route('cleanup.shop')}}">高</a></li>
                                            <li><a href="{{route('cleandown.shop')}}">低</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                                                        <!--  Catagories  -->
                            <div class="catagories-menu">
                                <ul id="menu-content2" class="menu-content collapse show">
                                    <!-- Single Item -->
                                    <li data-toggle="collapse" data-target="#clothing">
                                        <a>滯塵能力</a>
                                        <ul class="sub-menu collapse show" id="clothing">
                                            <li><a href="{{route('dustup.shop')}}">高</a></li>
                                            <li><a href="{{route('dustdown.shop')}}">低</a></li>
                                        </ul>
                                    </li>

                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort</p>
                                        <form name="jump">
                                            <select onchange="location=document.jump.menu.options[document.jump.menu.selectedIndex].value;" value="GO" name="menu"><br />
                                            <option value="" selected="selected">價格排序</option>
                                            <option value="{{route('sort.shop',['type'=>'asc'])}}">低到高</option>
                                            <option value="{{route('sort.shop',['type'=>'desc'])}}">高到低</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        @foreach ($goods as $good)
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="../img/product-img/{{$good->photo1}}" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="../img/product-img/{{$good->photo2}}" alt="">
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>
                                        {{$good->goods_name1}}
                                         </span>
                                        <a href="{{route('detail',['id'=>$good->id])}}">
                                            <h6> {{$good->goods_name2}}</h6>
                                        </a>
                                        <p class="product-price"> $ {{$good->price}}</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="{{route('cart.add',['id'=>$good->id])}}" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    

</body>

</html>

