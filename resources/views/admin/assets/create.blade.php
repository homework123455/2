@extends('admin.layouts.master')

@section('title', '新增場地')

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
            新增場地 <small>請輸入場地資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/assets" method="POST"  role="form"   enctype="multipart/form-data">
            {{ csrf_field() }}
       


            <div class="form-group">
                <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <label>上傳場地圖片:</label>
                </fieldset>

                <input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
				 <input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
                </div>
				
				<div class="form-group">
                <label>場地名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入場地名稱">
            </div>

            <div class="form-group">
                <label>場地類別：</label>
                <select name="category" class="form-control">
                    @foreach($categories as $category)
                    <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>開放星期：</label>
				<select name="week_id" class="form-control">
				@foreach($weeks as $week)
                    <option value={{ $week->id }}>{{ $week->week }}</option>
                    @endforeach
					</select>
               
            </div>

            <div class="form-group">
                <label>時段：</label>
				<select name="time_id" class="form-control">
				@foreach($times as $time)
                    <option value={{ $time->id }}>{{ $time->time_start}} ~ {{$time->time_end}}</option>
                    @endforeach
					</select>
               
            </div>

            <div class="form-group">
                <label>場地狀態：</label>
                <select name="status" class="form-control">
                    <option value="正常使用中">正常使用中</option>
                    <option value="維修中">維修中</option>
                    <option value="租借中">租借中</option>
                    
                </select>
            </div>

            <div class="form-group">
                <label>負責人：</label>
                <select name="keeper" class="form-control">
                    @foreach($users as $user)
                        <option value={{ $user->id }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>可否租借？</label>
                <select name="lendable" class="form-control">
                    <option value="0">否</option>
                    <option value="1">可</option>
                </select>
            </div>

            <div class="form-group">
                <label>地點：</label>
                <input name="location" class="form-control" placeholder="請輸入場地地點">
            </div>

            

            

            <div class="form-group">
                <label>詳細資訊：</label>
                <textarea name="remark" class="form-control" rows="5"></textarea>
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
