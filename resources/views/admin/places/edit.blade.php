@extends('admin.layouts.master')

@section('title', '修改場地')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改場地 <small>編輯場地資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/places/{{$place->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label>場地名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入場地名稱" value="{{$place->name}}">
            </div>

            <div class="form-group">
                <label>場地類別：</label>
                <select name="category" class="form-control">
                    @foreach($categories as $category)
                        @if($place->category==$category->id)
                            <option value={{ $category->id }} selected="true">{{ $category->name }}</option>
                        @else
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>開放星期：</label>
				<select name="week_id" class="form-control">
	            <option value="">請選擇</option>
				@foreach($weeks as $week)
				@if($week->id==$place->week_id)
				 
                 <option selected="true" value={{ $week->id }} >{{ $week->week }}</option>
			 @else
				  <option  value={{ $week->id }}>{{ $week->week }}</option>
			  @endif
                    @endforeach
					</select>
               
            </div>

            <div class="form-group">
                <label>時段：</label>
				<select name="time_id" class="form-control">
	<option value="">請選擇</option>
				@foreach($times as $time)
				@if($time->id==$place->time_id)
                    <option  selected="true" value={{ $time->id }}>{{ $time->time_start}} ~ {{$time->time_end}}</option>
				@else
				  <option  value={{ $time->id }}>{{ $time->time_start}} ~ {{$time->time_end}}</option>
			  @endif
                    @endforeach
					</select>
               
            </div>

            <div class="form-group">
                <label>場地狀態：</label>
                <label>{{$place->status}}</label>
            </div>

            <div class="form-group">
                <label>負責人：</label>
                <select name="keeper" class="form-control">
                    @foreach($users as $user)
                        @if($place->keeper==$user->id)
                            <option value={{ $user->id }} selected="true">{{ $user->name }}</option>
                        @else
                            <option value={{ $user->id }}>{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>可否租借：</label>
                @if($place->status=='租借中')
                    @if($place->lendable=="0")
                        <label>否</label>
                        @else
                        <label>是</label>
                    @endif
                    @else
                <select name="lendable" class="form-control">
                    <option value="0" {{ $place->lendable?'':'SELECTED' }}>否</option>
                    <option value="1" {{ $place->lendable?'SELECTED':'' }}>是</option>
                </select>
                    @endif
            </div>

            <div class="form-group">
                <label>地點：</label>
                <input name="location" class="form-control" placeholder="請輸入場地地點" value="{{$place->location}}">
            </div>

            

           

            <div class="form-group">
                <label>詳細資訊：</label>
                <input name="remark" class="form-control" placeholder="請輸入場地資訊" value="{{$place->remark}}">
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
