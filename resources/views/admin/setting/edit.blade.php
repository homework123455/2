@extends('admin.layouts.master')

@section('title', '系統設定')

@section('content')
<!-- Page Heading -->

@if(!(Auth::user()->previlege_id>=3))
    <div class="col-sm-12">
        <h1 class="page-header">
            <small></small>
        </h1>
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            系統設定 <small>分頁設定</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->


<div class="row">
    <div class="col-lg-12">
        <form class"form1" action="/admin/setting" method="POST"  role="form"   enctype="multipart/form-data">
            {{ csrf_field() }}
       
				<div class="form-group">
                <label>商品筆數：</label>
				<input name="goods" class="form-control" placeholder="請輸入商品筆數" value={{$good}}>
               
            </div>

            <div class="form-group">
                <label>訂單筆數：</label>
 <input name="orders" class="form-control" placeholder="請輸入訂單筆數" value={{$order}}>
				

            </div>
			

            <div class="text-right">
                <button type="submit" class="btn btn-success">確定</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
