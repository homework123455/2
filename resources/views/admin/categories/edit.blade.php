@extends('admin.layouts.master')

@section('title', '修改類別')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改類別 <small>編輯類別資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <form action="/admin/categories/{{$categories->id}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
			{{ method_field('PATCH') }}

            
            <div class="form-group">
			

                
                <label>場地名稱：</label>

                <input name="name" class="form-control"  value="{{$categories->name}}">
            </div>

           

            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
                <a class="btn btn-success" href="{{ route('admin.categories.index') }}"  role="button">返回</a>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
