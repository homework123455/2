@extends('admin.layouts.master')

@section('title', '商品進貨')

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
            商品進貨 <small>請填寫進貨資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->



<div class="row">
    <div class="col-lg-12">
        <form class"form1" action="/admin/shops/suppliers/store/{{$good->id}}" method="POST"  role="form"   enctype="multipart/form-data">
            {{ csrf_field() }}
       
                 
            				
				<div class="form-group">
                <label>商品名稱：</label>
				<select name="name" class="form-control">
                   
                    <option value={{ $good->id }}>{{ $good->name }}</option>
                   
                </select>
               
            </div>
			<div class="form-group">
 <label>供應商名稱：</label>
				<select name="supplier_id" class="form-control">
                    @foreach($suppliers as $supplier)
                    <option value={{ $supplier->id }}>{{ $supplier->name }}</option>
                    @endforeach
                </select>
               
            </div>
           


            			
			 
			<div class="form-group">
                <label>進貨數量：</label>
                <input name="value" class="form-control" placeholder="請輸入進貨數量">
            </div>


            <div class="form-group">
                <label>進貨價格：</label>
                <input name="price" class="form-control" placeholder="請輸入進貨價格">
            </div>


           

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
