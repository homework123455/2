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

        <form action="/admin/shops/supplement/{{$good->id}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
			{{ method_field('PATCH') }}

            
            <div class="form-group">
                <label>商品名稱：</label>

                <input name="name" class="form-control" value="{{$good->name}}" readonly>
            </div>


            <div class="form-group">
                <label>補貨數量：</label>

               <input name="value" class="form-control" placeholder="目前架上剩餘數量    {{$good->value}}   目前庫存數量    {{$good->stock}}" >
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
