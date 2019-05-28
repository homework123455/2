@extends('admin.layouts.master')

@section('title', '新增使用者')

@section('content')
<!-- Page Heading -->

@if(!(Auth::user()->previlege_id==3))
    <div class="col-sm-12">
        <h1 class="page-header">
            <small></small>
        </h1>
    </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增管理者 <small>請輸入管理者資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/users" method="POST" role="form">
            {{ csrf_field() }}

            <div class="form-group">
                <label width="80">使用者名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入使用者名稱">
            </div>

            <div class="form-group">
                <label width="80">E-mail：</label>
                <input name="email" class="form-control" placeholder="請輸入E-mail">
            </div>

            <div class="form-group">
                <label width="80">密碼：</label>
                <input name="password" class="form-control" placeholder="請輸入密碼">
            </div>

            <div class="form-group">
                <label width="80">確認密碼：</label>
                <input name="password-confirm" class="form-control" placeholder="請再次輸出密碼">
            </div>

            <div class="form-group">
                <label width="80">系所：</label>
                <select name='department_id'  class="form-control"  >
				
                    @foreach($departments as $department)
                        <option value={{ $department->id }}>{{ $department->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label width="80">職位：</label>
                <input name="position" class="form-control" placeholder="請輸入職位">
            </div>

            <div class="form-group">
                <label width="80">連絡電話：</label>
                <input name="phone" class="form-control" placeholder="請輸入連絡電話">
            </div>

            <div class="form-group">
                <label width="80">權限：</label>
                <select name='previlege_id' class="form-control">
                   
                        <option value="2">一般管理員</option>
						<option value="3">管理員</option>
                    
                </select>
            </div>


            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
				<a class="btn btn-success" href="javascript:window.history.go(-1);"  role="button">返回</a>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
