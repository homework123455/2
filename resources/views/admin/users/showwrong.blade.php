@extends('admin.layouts.master')

@section('title', '使用者管理')

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
            使用者管理 <small>使用者違規紀錄</small>
        </h1>
    </div>
</div>
<!-- /.row -->


<div class="row" style="margin-bottom: 20px; text-align: right" >

    <div class="col-lg-12">
        <a href="{{ route('admin.users.showwrong.wrongcreate', $user->id) }}" class="btn btn-success">增加新違規</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>

                        <th width="120" style="text-align: center">姓名</th>
                        <th width="100" style="text-align: center">違規編號</th>
                        <th width="120" style="text-align: center">違規內容</th>
                        <th width="80 " style="text-align: center">違規時間</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($wrong as $wrongs)
                    @if($user->id==$wrongs->user_id)
                    <tr>
                        <td style="text-align: center">{{$user->name}}</td>
                        <td style="text-align: center">{{$wrongs->id}}</td>
                        <td style="text-align: center">{{$wrongs->wrongname}}</td>
                        <td style="text-align: center">{{$wrongs->date}}</td>





                    </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
