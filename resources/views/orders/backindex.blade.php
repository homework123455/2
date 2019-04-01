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
	
    
	
        
 <div class="panel panel-warning">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#collapse4">
					<i class="fa fa-edit"></i>訂單處理-退貨
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
                    <th style="text-align:center">退貨商品</th>
					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>
					@foreach ($orders as $order1)
                    @foreach ($ordersdetail as $order)
						
						@if ($order->orders_id == $order1->id && $order->status =='退貨中')
							
                        <tr>
                            <!-- 任務名稱 -->
							
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order1->id}}</div>
                            </td>
							
							
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order->product}}</div>
                            </td>
							
							
							
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order1->name}}</div>
                            </td>
							
							
							
                    
                    

                        <td class="table-text" style="text-align: center">
                                
									<div> <a href="{{ route('orders.backshow', $order->id) }}" class="btn btn-danger" role="button">處理</a></div>
								
                        </td>
                    
                        </tr>

						@endif
						@endforeach
                    @endforeach
					
                    </tbody>
                </table>
            </div>
			
			
        </div>
		 </div>
		  </div>
		  <div class="panel panel-warning">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#collapse101">
					<i class="fa fa-edit"></i>訂單處理-已退貨
				</a>
			</h4>
		</div>
<div id="collapse101" class="panel-collapse collapse">
			<div class="panel-body">
           <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>
                    <th style="text-align:center">退貨商品</th>
					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>
					@foreach ($orders as $order1)
                    @foreach ($ordersdetail as $order)
						
						@if ($order->orders_id == $order1->id && $order->status =='已退貨')
							
                        <tr>
                            <!-- 任務名稱 -->
							
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order1->id}}</div>
                            </td>
							
							
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order->product}}</div>
                            </td>
							
							
							
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{ $order1->name}}</div>
                            </td>
							
							
							
                    
                    

                        <td class="table-text" style="text-align: center">
                                
									<div> <a href="{{ route('orders.show1', $order->orders_id) }}" class="btn btn-primary" role="button">查看</a></div>
								
                        </td>
                    
                        </tr>

						@endif
						@endforeach
                    @endforeach
					
                    </tbody>
                </table>
            </div>
			
			
        </div>
		 </div>
		  </div>
		  </div>

<script type="text/javascript">
	$(function () { $('#collapse4').collapse({
		'show'
	})});
	
</script>
@endsection