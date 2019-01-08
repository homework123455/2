@extends('admin.layouts.master')

@section('title', '場地申請')

@section('content')
<!-- Page Heading -->
<div class="row">
    @if(!(Auth::user()->previlege_id>=3))
        <div class="col-sm-12">
            <h1 class="page-header">
                <small></small>
            </h1>
        </div>
    @endif
    <div class="col-lg-12">
        <h1 class="page-header">
            場地申請 <small>請選擇場地</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/assets/{{$asset->id}}/application/store" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div>
            <div class="form-group">
                <label>場地名稱：</label>
                <lable name="name">{{$asset->name}}</lable>
            </div>

            <div class="form-group">
                <label>場地類別：</label>
                <lable name="category">{{$category->name}}</lable>
            </div>

            <div class="form-group">
                <label>場地狀態：</label>
                <lable name="status">{{$asset->status}}</lable>
            </div>

            <div class="form-group">
                <label>保管人：</label>
                <lable name="keeper">{{$user->name}}</lable>
            </div>

            <div class="form-group">
                <label>地點：</label>
                <lable name="location">{{$asset->location}}</lable>
            </div>
            </div>

            <div  class="form-group">
                <label>問題描述：</label>
                <textarea name="problem" class="form-control" rows="2"></textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-success">申請</button>
                <a href="{{ route('admin.assets.index') }}" class="btn btn-success">返回</a>
            </div>
        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
