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
    <link rel="icon" href="../../img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="../../css/core-style.css">
    <link rel="stylesheet" href="../../style.css">

</head>

<body>
    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area  bg-img" style="background-image: url(../../img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>News</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="single-blog-wrapper">

        @foreach($news as $new)

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="regular-page-content-wrapper section-padding-80">
                        <div class="regular-page-text">
                            <h2>{{$new->title}}</h2>
                            <p>{{$new->content1}}</p>
                            <div class="single_product_thumb d-flex justify-content-center mb-50">
                                <img src="../../img/news-img/{{$new->photo}}" alt="">
                            </div>
                            <p>{{$new->content2}}</p>
                            <p>{{$new->content3}}</p>
                            <p>{{$new->content4}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- ##### Blog Wrapper Area End ##### -->






</body>

</html>