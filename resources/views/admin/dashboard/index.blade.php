@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            主控台 <small></small>
        </h1>
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
                            <th width="200" style="text-align: center">
                                功能
                                <a href="{{ route('admin.announcements.create') }}" class="btn btn-success">新增公告</a>
                            </th>
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
                                <td>
                                    <table >
                                        <tbody>
                                        <tr class="table-text" style="text-align: center">
                                            <td width="100" >
                                                <a class="btn btn-primary" role="button" href="{{ route('admin.announcements.edit', $announcement->id) }}" >修改</a>
                                            </td>
                                            <!-- 刪除按鈕 -->
                                            <td width="100">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                                    刪除
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title" id="myModalLabel">提示訊息</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                確定刪除？
                                                            </div>
                                                            <div class="modal-footer">
                                                                <table style="text-align: right">
                                                                    <tbody style="text-align: right">
                                                                    <tr class="table-text" style="text-align: center">
                                                                        <td width="100" >
                                                                            <form action="{{ route('admin.announcements.destroy', $announcement->id) }}" method="POST">
                                                                                {{ csrf_field() }}
                                                                                {{ method_field('DELETE') }}
                                                                                <button class="btn btn-danger">刪除</button>
                                                                            </form>
                                                                        </td>
                                                                        <td width="100">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 目前報修
            </li>
        </ol>
        @if(count($applications) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="80" style="text-align: center">維修編號</th>
                        <th style="text-align: center">資產名稱</th>
                        <th width="100" style="text-align: center">維修狀態</th>
                        <th width="80" style="text-align: center">維修方式</th>
                        <th width="120" style="text-align: center">申請日期</th>
                        <th width="100" style="text-align: center">功能</th>
                    </tr>
                    </thead>
                    @foreach($applications as $application)
                    <tbody>
                    @foreach($maintainces as $maintaince)
                        @if($maintaince->id==$application->maintaince_id)
                        <tr>
                            <td style="text-align: center">
                                {{ $maintaince->id }}
                            </td>

                            <td style="text-align: center">
                                @foreach($assets as $asset)
                                    @if($maintaince->asset_id==$asset->id)
                                        {{ $asset->name }}
                                    @endif
                                @endforeach
                            </td>

                            <td style="text-align: center">{{ $maintaince->status }}</td>

                            <td style="text-align: center">{{ $maintaince->method }}</td>

                            <td style="text-align: center">
                                    @if($maintaince->id==$application->maintaince_id)
                                        {{ $application-> date}}
                                    @endif
                            </td>

                            <td class="table-text" style="text-align: center">
                                <a href="{{ route('admin.maintainces.show', $maintaince->id) }}" class="btn btn-primary" role="button">處理</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                    @endforeach
                </table>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 申請處理
            </li>
        </ol>
        @if(count($maintaincesA) > 0)
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="80" style="text-align: center">申請編號</th>
                    <th style="text-align: center">場地名稱</th>
                    <th width="100" style="text-align: center">申請狀態</th>
                    
                    <th width="120" style="text-align: center">申請日期</th>
                    <th width="100" style="text-align: center">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($maintaincesA as $maintaince)
                    <tr>
                        <td style="text-align: center">
                            {{ $maintaince->id }}
                        </td>

                        <td style="text-align: center">
                            @foreach($assets as $asset)
                                @if($maintaince->asset_id==$asset->id)
                                    {{ $asset->name }}
                                @endif
                            @endforeach
                        </td>

                        <td style="text-align: center">{{ $maintaince->status }}</td>

                        

                        <td style="text-align: center">
                            @foreach($applicationsA as $application)
                                @if($maintaince->id==$application->maintaince_id)
                                    {{ $application-> date}}
                                @endif
                            @endforeach
                        </td>

                        <td class="table-text" style="text-align: center">
                            <a href="{{ route('admin.maintainces.show', $maintaince->id) }}" class="btn btn-primary" role="button">處理</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            @endif
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 部門內報修
            </li>
        </ol>

    </div>
</div>
<!-- /.row -->

<div class="row">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
<!-- /.row -->

@endsection
