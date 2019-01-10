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
        <form action="/admin/assets/{{$asset->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label>場地名稱：</label>
                <input name="name" class="form-control" placeholder="請輸入場地名稱" value="{{$asset->name}}">
            </div>

            <div class="form-group">
                <label>場地類別：</label>
                <select name="category" class="form-control">
                    @foreach($categories as $category)
                        @if($asset->category==$category->id)
                            <option value={{ $category->id }} selected="true">{{ $category->name }}</option>
                        @else
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>購置日期：</label>
                <input name="date" class="form-control" placeholder="請輸入場地購置日期" value="{{$asset->date}}">
            </div>

            <div class="form-group">
                <label>成本：</label>
                <input name="cost" class="form-control" placeholder="請輸入場地成本" value="{{$asset->cost}}">
            </div>

            <div class="form-group">
                <label>場地狀態：</label>
                <label>{{$asset->status}}</label>
            </div>

            <div class="form-group">
                <label>保管人：</label>
                <select name="keeper" class="form-control">
                    @foreach($users as $user)
                        @if($asset->keeper==$user->id)
                            <option value={{ $user->id }} selected="true">{{ $user->name }}</option>
                        @else
                            <option value={{ $user->id }}>{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>可否租借：</label>
                @if($asset->status=='租借中')
                    @if($asset->lendable=="0")
                        <label>否</label>
                        @else
                        <label>是</label>
                    @endif
                    @else
                <select name="lendable" class="form-control">
                    <option value="0" {{ $asset->lendable?'':'SELECTED' }}>否</option>
                    <option value="1" {{ $asset->lendable?'SELECTED':'' }}>是</option>
                </select>
                    @endif
            </div>

            <div class="form-group">
                <label>地點：</label>
                <input name="location" class="form-control" placeholder="請輸入場地地點" value="{{$asset->location}}">
            </div>

            

           

            <div class="form-group">
                <label>詳細資訊：</label>
                <input name="remark" class="form-control" placeholder="請輸入場地資訊" value="{{$asset->remark}}">
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
                <a class="btn btn-success" href="{{ route('admin.assets.index') }}"  role="button">返回</a>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
