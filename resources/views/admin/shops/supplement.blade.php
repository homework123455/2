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
			
			<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="100" style="text-align: center">編號</th>
                        <th style="text-align: center">剩餘數量</th>
                        <th width="100" style="text-align: center">進貨成本</th>
                        <th style="text-align: center">進貨時間</th>
                        <th width="200" style="text-align: center">功能</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($suppliersdetails as $suppliersdetail)
                    <tr>
                        <td style="text-align: center">{{ $suppliersdetail->id}}</td>
                        <td style="text-align: center">{{ $suppliersdetail->value }}</td>
                        <td style="text-align: center">{{ $suppliersdetail->price}}</td>
                        <td style="text-align: center">{{ $suppliersdetail->created_at }} </td>
						@if($suppliersdetail->checked==0)
                        <td style="text-align: center"><input type="checkbox" name="select" value="{{route('admin.shops.update2',['id'=>$good->id,'q'=>$suppliersdetail->id])}}" onchange="javascript:location.href=this.value;"></td>
                        @else
						<td style="text-align: center"><input type="checkbox" name="select" checked value="{{route('admin.shops.update2',['id'=>$good->id,'q'=>$suppliersdetail->id])}}" onchange="javascript:location.href=this.value;"></td>
				        @endif
				@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
			

            <div class="form-group">
                <label>補貨數量：</label>

               <input name="value" id="value" class="form-control" placeholder="目前架上剩餘數量    {{$good->value}} " onchange="myFunction()">
			   <label>最大進貨數量：{{$total}}</label>
            </div>
			
	<script>
    function myFunction(){
        var x=document.getElementById("value");
		if(x.value>{{$total}}){

        x.value={{$total}};
		alert("超出最大進貨數量");
		}
     }
</script>
				
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
			   <label>建議售價：{{$price}}</label>
            </div>


            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
                <a class="btn btn-success" href="javascript:window.history.go(-1);"  role="button">返回</a>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
