@extends('admin.layouts.master')

@section('title', '修改公告')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改公告 <small>編輯公告</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/announcements/{{$announcements->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label>標題：</label>
                <input name="title" class="form-control" placeholder="請輸入耗材名稱" value="{{$announcements->title}}">
            </div>

            <div class="form-group">
                <label>內容：</label>
                <textarea name="content" class="form-control">{{$announcements->content}}</textarea>
            </div>

            <div class="form-group">
                <label>日期：</label>
                <label name="date" class="form-control">{{$announcements->date}}</label>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
            </div>
        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
