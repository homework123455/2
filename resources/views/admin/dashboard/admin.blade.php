@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">
           <small></small>
        </h1>
    </div>
        <div class="col-lg-12">
        <h1 class="page-header">
            <small></small>
        </h1>

        </div>
        <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 公告
            </li>
        </ol>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="100" style="text-align: center">標題</th>
                            <th style="text-align: center">內容</th>
                            <th width="100" style="text-align: center">日期</th>
                            <th style="text-align: center">發布者</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($announcements as $announcement)
                            <tr>
                                <td style="text-align: center">{{ $announcement->title}}</td>
                                <td style="text-align: center">{{ $announcement->content }}</td>
                                <td style="text-align: center">{{ $announcement->date}}</td>
                                <td style="text-align: center">
                                    @foreach($users as $user)
                                        @if($announcement->user_id==$user->id)
                                            {{ $user->name }}
                                        @endif
                                    @endforeach
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<p>&nbsp;</p>

<div class="row,page-header"  style="margin-bottom: 40px; text-align: center" >
    <div class="col-xs-6">
        <a href="{{ route('admin.users.index') }}" class="btn btn-primary  btn-lg">查看使用者</a>

    </div>
    <div class="col-xs-6">

        <a href="{{ route('admin.users.create') }}" class="btn btn-primary  btn-lg">新增使用者</a>
    </div>
</div>
<!-- /.row -->

<div class="row">
    <p>&nbsp;</p>

    <p>&nbsp;</p>
</div>
<!-- /.row -->

@endsection
