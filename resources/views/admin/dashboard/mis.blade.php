@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 公告
            </li>
        </ol>
        <div style="text-align: right">
                <a href="{{ route('admin.news.create') }}" class="btn btn-success">新增公告</a>
        </div>
        <p></p>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="100" style="text-align: center">標題</th>
                                <th width="300" style="text-align: center">內容</th>
                                <th width="100" style="text-align: center">日期</th>
                                <th width="100" style="text-align: center">發布者</th>
                                <th width="100" style="text-align: center">功能</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $new)
                                <tr>
                                    <td style="text-align: center">{{ $new->title}}</td>
                                    <td style="text-align: center">{{ $new->content }}</td>
                                    <td style="text-align: center">{{ $new->date}}</td>
                                    <td style="text-align: center">
                                        @foreach($users as $user)
                                            @if($new->user_id==$user->id)
                                                {{ $user->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <table >
                                            <tbody>
                                            <tr class="table-text" style="text-align: center">
                                                <td width="100" >
                                                    <a class="btn btn-primary" role="button" href="{{ route('admin.news.edit', $new->id) }}" >修改</a>
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
                                                                                <form action="{{ route('admin.news.destroy', $new->id) }}" method="POST">
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
                <i class="fa fa-dashboard"></i> 申請處理
            </li>
        </ol>
        @if(count($maintainces) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="100" style="text-align: center">申請編號</th>
                                <th width="300" style="text-align: center">場地名稱</th>
                                <th width="100" style="text-align: center">申請狀態</th>
                                
                                <th width="120" style="text-align: center">申請日期</th>
                                <th width="100" style="text-align: center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($maintainces as $maintaince)
                                @if(($maintaince->status=='申請中'))

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
                                    @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@if(count($place_overtimes) > 0)
	<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
			<script language="JavaScript">

function ShowTime(){
　var NowDate=new Date();
　var h=NowDate.getHours();
　var m=NowDate.getMinutes();
　var s=NowDate.getSeconds();　

document.getElementById('showbox').innerHTML = '現在是'+h+'點'+m+'分'+s+'秒';

setTimeout('ShowTime()',1000);
}
</script>
<body onload="ShowTime()">


                <i class="fa fa-dashboard" ></i> 超過時間 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-dashboard" id="showbox"></i>  
	</body>			
				
            </li>
        </ol>
		 <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="100" style="text-align: center">場地編號</th>
                                <th width="200" style="text-align: center">場地名稱</th>
								<th width="100" style="text-align: center">應歸還時間</th>
                                <th width="100" style="text-align: center">租借人</th>
								</tr>
                            </thead>
                            <tbody>
							@foreach($place_overtimes as $place_overtime)
                                

                                    <tr>
                                        <td style="text-align: center">
                                            {{ $place_overtime->id }}
                                        </td>
                                        <td style="text-align: center">{{ $place_overtime->name }}</td>  
										@foreach($times as $time)
										@if($time->id==$place_overtime->time_id)
										
                                        <td style="text-align: center">{{ $time->time_end }}</td> 										
                                         @endif
										 @endforeach
                                        <td style="text-align: center">{{ $place_overtime->lendname }}</td>
										</tr>
                                    
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
		</div>
		</div>
		@endif
	
<!-- /.row -->

<div class="row">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
<!-- /.row -->

@endsection
