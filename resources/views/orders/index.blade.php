@extends('admin.layouts.master')

	 
@section('content')

    <!-- Bootstrap 樣板... -->

    <div class="panel-body">
        <!-- 顯示驗證錯誤 -->
    

    <!-- 新任務的表單 -->
        <form action="/order" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- 任務名稱 -->

        </form>
    </div>

    <!-- 目前任務 -->
	
    @if (count($order_status1) > 0)
        <div class="row">
    <div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#collapseOne">
					<i class="fa fa-edit"></i>訂單處理-未處理<span class="badge">{{count($order_status1_)}}</span>
				</a>
			</h4>
		</div>
<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
           <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>
					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>

                    @foreach ($order_status1 as $order)
					@if($order->status=="未處理")
                        <tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
                                <div>{{ $order->id}}</div>
                            </td>
							
							@foreach($users as $user)
							@if($user->id==$order->users_id)
							<td style="text-align: center">
                                <div>{{ $user->name}}</div>
                            </td>
							@endif
							@endforeach
							
                    
                    

                        <td class="table-text" style="text-align: center">
                                
                                   <div> <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary" role="button">處理</a></div>
                                
                        </td>
                    
	
                    
                

                        </tr>
						@endif
                    @endforeach
					
                    </tbody>
                </table>
            </div>
		
			{!! $order_status1->appends(['page2' => $order_status2->currentPage(),'page3' => $order_status3->currentPage() ])->render() !!}
					</div>
		</div>
        </div>
    @endif
	@if (count($order_status2) > 0)
        
   <div class="panel panel-success">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#collapse2">
					<i class="fa fa-edit"></i>訂單處理-處理中<span class="badge">{{count($order_status2_)}}</span>
				</a>
			</h4>
		</div>
<div id="collapse2" class="panel-collapse collapse">
			<div class="panel-body">
           <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>

					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>

                    @foreach ($order_status2 as $order)
					@if($order->status=="處理中"||$order->status=="已處理")
                        <tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
                                <div>{{ $order->id}}</div>
                            </td>
						
							@foreach($users as $user)
							@if($user->id==$order->users_id)
							<td style="text-align: center">
                                <div>{{ $user->name}}</div>
                            </td>
							@endif
							@endforeach
							
                    
                    

                        <td class="table-text" style="text-align: center">
						
						
                               
                                  <form action="{{ route('orders.scrapped', $order->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-success">出貨</button>
													<a href="{{ route('orders.show1', $order->id) }}" class="btn btn-primary" role="button">查看</a>
                                                </form>
												
                                
                        </td>
                    
	
                    
                

                        </tr>
						@endif
                    @endforeach
					
                    </tbody>
                </table>
            </div>
			
{!! $order_status2->appends(['page1' => $order_status1->currentPage() ,'page3' => $order_status3->currentPage() ])->render() !!}
			</div>
			</div>
        </div>
    @endif
	@if (count($order_status4) > 0)
        
   <div class="panel panel-info">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#collapse3">
					<i class="fa fa-edit"></i>訂單處理-已出貨<span class="badge">{{count($order_status4_)}}</span>
				</a>
			</h4>
		</div>
<div id="collapse3" class="panel-collapse collapse">
			<div class="panel-body">
           <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>

					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>

                    @foreach ($order_status4 as $order)
					@if($order->status=="已出貨")
                        <tr>
                            <!-- 任務名稱 -->
							@if($order->status=="已出貨")
                            <td style="text-align: center">
                                <div>{{ $order->id}}</div>
                            </td>
							@else
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order->id}}</div>
                            </td>
							@endif
							
							@foreach($users as $user)
							@if($user->id==$order->users_id)
								@if($order->status=="已出貨")
							<td style="text-align: center">
                                <div>{{ $user->name}}</div>
                            </td>
							@else
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order->name}}</div>
                            </td>
							@endif
							@endif
							@endforeach
							
							
                    
                    

                        <td class="table-text" style="text-align: center">
                                
                                   <div> <a href="{{ route('orders.show1', $order->id) }}" class="btn btn-primary" role="button">查看</a></div>
                                
                        </td>
                    
                        </tr>
						@endif
                    @endforeach
					
                    </tbody>
                </table>
            </div>
			
			{!! $order_status4->appends(['page1' => $order_status1->currentPage(),'page2' => $order_status2->currentPage(),'page3' => $order_status3->currentPage() ])->render() !!}
        </div>
		 </div>
		  </div>
    @endif

<script type="text/javascript">
	$(function () { $('#collapse4').collapse({
		toggle: false
	})});
	$(function () { $('#collapse2').collapse('toggle')});
	$(function () { $('#collapse3').collapse('toggle')});
	$(function () { $('#collapseOne').collapse('toggle')});
</script>
@endsection