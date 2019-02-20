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
    <div class="breadcumb_area  bg-img" style="background-image: url(img/bg-img/breadcumb3.jpg);">
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
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Wrapper Area Start ##### -->
    <div class="blog-wrapper section-padding-80">
        <div class="container">
            <div class="row">
            @foreach($news as $new)
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-blog-area mb-50">
                        <img src="img/news-img/{{$new->photo}}" alt="">
                        <!-- Post Title -->
                        <div class="post-title">
                            <a href="#">{{$new->title}}</a>
                        </div>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <!-- Post Title -->
                            <div class="hover-post-title">
                                <a href="#">{{$new->title}}</a>
                            </div>
                            <p>{{$new->content1}}</p>
                            <a href="{{route('news.detail',['id'=>$new->id])}}">繼續閱讀<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
        </div>
    </div>


</body>

</html>