@extends('admin.layouts.master')

@section('title', '商品補貨')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            商品 <small>補貨</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <form  action="/admin/shops/supplement/{{$good->id}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
			{{ method_field('PATCH') }}

            
            <div class="form-group">
                <label>商品名稱：</label>

                <input name="name" class="form-control" value="{{$good->name}}" readonly>
            </div>
			<select id="select" name="select" class="form-control" >
			@foreach($suppliersdetails as $suppliersdetail)
			@if($suppliersdetail->value>0)
                        <option value={{$suppliersdetail->id}}>編號:{{$suppliersdetail->id}}&nbsp&nbsp&nbsp剩餘數量:{{$suppliersdetail->value}}&nbsp&nbsp&nbsp進貨時間:{{$suppliersdetail->created_at}}</option>
			@endif
			@endforeach
                       
                </select>

            <div class="form-group">
                <label>補貨數量：</label>

               <input name="value" class="form-control" placeholder="目前架上剩餘數量    {{$good->value}} " >
            </div>
			
	
				
			<?php
			if(isset($request->select)){
			$value=$_GET['value'];
	$link=mysqli_connect("localhost:33060","root","root","homestead");
	$sql ="SELECT * FROM suppliersdetail WHERE id='$value'";
	$rec = $link->query($sql);	
	$rNum = $rec->num_rows;
	$rs = $rec->fetch_array();
	$S1=$rs['id'];
			}
	?>
	
			<div class="form-group">
                <label>商品價格：</label>

               <input name="price" class="form-control"  >
            </div>


            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
                <a class="btn btn-success" href="{{ route('admin.places.index') }}"  role="button">返回</a>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
