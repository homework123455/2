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
	
    
	@if (count($order_status3) > 0)
        
 <div class="panel panel-warning">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse"  
				   href="#collapse4">
					<i class="fa fa-edit"></i>訂單處理-已完成
				</a>
			</h4>
		</div>
<div id="collapse4" class="panel-collapse collapse">
			<div class="panel-body">
           <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>
                    <th style="text-align:center">送貨地址</th>
					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>

                    @foreach ($order_status3 as $order)
					@if($order->status=="已完成"||$order->status=="駁回")
                        <tr>
                            <!-- 任務名稱 -->
							@if($order->status=="已完成")
                            <td style="text-align: center">
                                <div>{{ $order->id}}</div>
                            </td>
							@else
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order->id}}</div>
                            </td>
							@endif
							@if($order->status=="已完成")
							<td style="text-align: center">
                                <div>{{ $order->address}}</div>
                            </td>
							@else
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order->address}}</div>
                            </td>
							@endif
							
							@foreach($users as $user)
							@if($user->id==$order->users_id)
								@if($order->status=="已完成")
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
                                @if($order->status=="已完成")
                                   <div> <a href="{{ route('orders.show1', $order->id) }}" class="btn btn-primary" role="button">查看</a></div>
                                @else
									<div> <a href="{{ route('orders.show1', $order->id) }}" class="btn btn-danger" role="button">查看</a></div>
								@endif
                        </td>
                    
                        </tr>
						@endif
                    @endforeach
					
                    </tbody>
                </table>
            </div>
			
			{!! $order_status3->appends(['page1' => $order_status1->currentPage(),'page2' => $order_status2->currentPage() ])->fragment('collapse4')->render() !!}
        </div>
		 </div>
		  </div>
		  
		  </div>
@else
	  <i class="fa fa-edit"></i>無資料
    @endif
	<script type="text/javascript">

	$(document).ready(function () {
    var hash = window.location.hash;
    if (hash) {
        $("#accordion .panel-collapse").removeClass('in');
        $(hash).addClass('in');
    }

    $('#accordion').on('shown.bs.collapse', function () {
        var activeId = $("#accordion .in").attr('id');
        window.location.hash = activeId;
    });

    $('#accordion').on('hidden.bs.collapse', function () {
        window.location.hash = '';
    });
});

</script>

@endsection