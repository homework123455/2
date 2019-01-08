@extends('admin.layouts.master')

@section('title', '使用者資料')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            使用者 <small>使用者資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
            <div class="form-group">
                <label width="80">使用者名稱：</label>
                <label name="name">{{$user->name}}</label>
            </div>

            <div class="form-group">
                <label width="80">E-mail：</label>
                <label name="email">{{$user->email}}</label>
            </div>

            <div class="form-group">
                <label width="80">部門：</label>
                <label name="department_id">{{$user->department_id}}</label>
            </div>

            <div class="form-group">
                <label width="80">分機號碼：</label>
                <label name="extension">{{$user->extension}}</label>
            </div>

            <div class="form-group">
                <label width="80">職位：</label>
                <label name="position">{{$user->position}}</label>
            </div>

            <div class="form-group">
                <label width="80">連絡電話：</label>
                <label name="phone">{{$user->phone}}</label>
            </div>

            <div class="form-group">
                <label width="80">權限：</label>
                    <label name="previlege_id">{{$previlege->name}}</label>
            </div>

        <div>
            <a href="{{ route('admin.dashboard.index') }}" class="btn btn-success">返回</a>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
