@extends('admin.layouts.master')

@section('title', '主控台')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 訂單取消申請
            </li>
        </ol>
       
        
     @if(count($C_orders) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                               
                                <th width="300" style="text-align: center">訂單編號</th>
                                <th width="100" style="text-align: center">申請狀態</th>
                                
                                <th width="120" style="text-align: center">申請日期</th>
                                <th width="100" style="text-align: center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($C_orders as $C_order)
                                @if(($C_order->status=='取消審核中'))

                                    <tr>
                                        <td style="text-align: center">
                                            {{ $C_order->id }}
                                        </td>
                                       
                                        <td style="text-align: center">{{ $C_order->status }}</td>
                                        
                                        <td style="text-align: center">
                                            
                                                    {{ $C_order-> updated_at}}
                                               
                                        </td>
                                        <td class="table-text" style="text-align: center">
                                           
                                                
                                            
                                        <a href="{{ route('orders.cancelshow', $C_order->id) }}" class="btn btn-primary" role="button">處理</a>
                                            
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


<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> 申請處理
            </li>
        </ol>
        @if(count($ordersapplys) > 0)
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="300" style="text-align: center">申請編號</th>
                                <th width="100" style="text-align: center">會員姓名</th>
                               
                                <th width="120" style="text-align: center">申請日期</th>
                                <th width="100" style="text-align: center">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ordersapplys as $ordersapply)
                                @if(($ordersapply->status=='未處理'))

                                    <tr>
                                        <td style="text-align: center">
                                            {{ $ordersapply->id }}
                                        </td>
                                        <td style="text-align: center">
                                            @foreach($users as $user)
                                                @if($ordersapply->users_id==$user->id)
                                                    {{ $user->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                       
                                        
                                        <td style="text-align: center">
										{{$ordersapply->created_at}}
                                        </td>
                                        <td class="table-text" style="text-align: center">
                                           
                                                
                                            
                                        <a href="{{ route('admin.maintainces.show', $ordersapply->id) }}" class="btn btn-primary" role="button">處理</a>
                                            
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


               
	
<!-- /.row -->

<div class="row">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
<!-- /.row -->

@endsection
