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
                <i class="fa fa-dashboard"></i> 訂單取消申請
            </li>
        </ol>

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
                            @foreach($places as $place)
                                @if($maintaince->asset_id==$place->id)
                                    {{ $place->name }}
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
                            @foreach($places as $place)
                                @if($maintaince->asset_id==$place->id)
                                    {{ $place->name }}
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
