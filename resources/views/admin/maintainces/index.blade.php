@extends('admin.layouts.master')

@section('title', '申請處理')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            申請處理 <small>所有申請列表</small>
        </h1>
    </div>
</div>



@if(count($maintaincesA) > 0)
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>申請處理-處理中
            </li>
        </ol>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="80" style="text-align: center">申請編號</th>
                    <th style="text-align: center">場地名稱</th>
                    <th width="100" style="text-align: center">申請狀態</th>
                   
                    <th width="120" style="text-align: center">申請日期</th>
                    <th width="100" style="text-align: center">功能</th>
                </tr>
                </thead>
                <tbody>
                @foreach($maintainces as $maintaince)
                    @if($maintaince->status=='申請中')
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
                            @foreach($applications as $application)
                                @if($maintaince->id==$application->maintaince_id)
                                    {{ $application-> date}}
                                @endif
                            @endforeach
                        </td>
                        <td class="table-text" style="text-align: center">
                                
                                    <a href="{{ route('admin.maintainces.show', $maintaince->id) }}" class="btn btn-primary" role="button">處理</a>
                                
                        </td>
                    </tr>
	
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
	@else
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>申請處理-目前無申請
            </li>
        </ol>
		</div>
</div>

@endif
<!-- /.row -->
@endsection
