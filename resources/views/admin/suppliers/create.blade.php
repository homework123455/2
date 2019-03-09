@extends('admin.layouts.master')

@section('title', '新增商品類別')

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
            新增供應商 <small>請輸入供應商資料資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/suppliers" method="POST"  role="form"   enctype="multipart/form-data">
            {{ csrf_field() }}
       


            
				
				<div class="form-group">
                <label>供應商名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入供應商名稱">
            </div>
			<div class="form-group">
                <label>供應商電話：</label>
                <input name="phone" class="form-control" placeholder="請輸入供應商電話">
            </div>
			<div class="form-group">
                <label>供應商地址：</label>
                <input name="address" class="form-control" placeholder="請輸入供應商地址">
            </div>
@if(isset($msg))
<div class="alert alert-danger">{{$msg}}</div>


@endif
           

            

            


            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
