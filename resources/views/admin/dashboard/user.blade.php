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
        <div class="row,page-header" style="margin-bottom: 20px; text-align: right" >
            <div>
                <a href="{{ route('admin.places.index') }}" class="btn btn-primary">我要租借</a>
        </div>
        </div>
		@if(count($asset_overtimes1) > 0)
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
                                <th width="300" style="text-align: center">場地名稱</th>
                                
								</tr>
                            </thead>
                            <tbody>
							@foreach($asset_overtimes1 as $place_overtime)
                                

                                    <tr>
                                        <td style="text-align: center">
                                            {{ $place_overtime->id }}
                                        </td>
                                        <td style="text-align: center">
                                            
                                                    {{ $place_overtime->name }}
                                               
                                        </td>
										
                                        
										</tr>
                                    
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
		</div>
		
		@endif
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
                <i class="fa fa-dashboard"></i> 我的申請
            </li>
        </ol>
		
        @if(count($applications) > 0)
			
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="100" style="text-align: center">申請編號</th>
                        <th style="text-align: center">場地名稱</th>
                        <th width="100" style="text-align: center">申請狀態</th>
                        <th width="120" style="text-align: center">申請日期</th>
						
						<th width="80" style="text-align: center">功能</th> 
						
						  
                    </tr>
                    </thead>
                    @foreach($applicationsA as $application)
                        
						
						<tbody>
                        @foreach($maintainces_A as $maintaince)
                           @if($maintaince->id==$application->maintaince_id)
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
                                       
                                            {{ $maintaince-> date}}
                                        
                                    </td>
									
									
									<td class="table-text" style="text-align: center">
                                     @if($maintaince->status=='申請中')
                                                                        
																			<form action="{{ route('admin.maintainces.destroy', $maintaince->id ) }}" method="POST">
																		{{ csrf_field() }}
                                                                        {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger">取消</button>
                                                                        </form>
																		@else
                                                <a class="btn btn-danger disabled" role="button">取消</a>
																		@endif
                                                                    
											
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
