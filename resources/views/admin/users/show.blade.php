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
                <label width="80">系所：</label>
                <label name="department_id">
				@foreach($departments as $department)
				@if($user->department_id==$department->id)
				{{$department->name}}</label>
			@endif
			@endforeach
            </div>
			
			 <div class="form-group">
                <label width="80">性別</label>
                <label name="phone">{{$user->gender}}</label>
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
           <a class="btn btn-primary" role="button" href="{{ route('admin.users.edit', $user->id) }}" >修改</a>
        </div>

        <div>
            <a class="btn btn-success" href="javascript:window.history.go(-1);"  role="button">返回</a>
        </div>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
