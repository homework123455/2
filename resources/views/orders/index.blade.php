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
        <div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>訂單處理-未處理
            </li>
        </ol>

           <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>
                    <th style="text-align:center">訂單內容</th>
					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>

                    @foreach ($orders as $order)
					@if($order->status=="未處理")
                        <tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
                                <div>{{ $order->id}}</div>
                            </td>
							<td style="text-align: center">
                                <div>{{ $order->address}}</div>
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
        </div>
    @endif
	@if (count($order_status2) > 0)
        
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>訂單處理-處理中
            </li>
        </ol>

           <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>
                    <th style="text-align:center">訂單內容</th>
					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>

                    @foreach ($orders as $order)
					@if($order->status=="處理中")
                        <tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
                                <div>{{ $order->id}}</div>
                            </td>
							<td style="text-align: center">
                                <div>{{ $order->address}}</div>
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
        </div>
    @endif
	@if (count($order_status3) > 0)
        
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i>訂單處理-已完成
            </li>
        </ol>

           <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>
                    <th style="text-align:center">訂單內容</th>
					<th style="text-align:center">會員姓名</th>
                    <th style="text-align:center">處理</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>

                    @foreach ($orders as $order)
					@if($order->status=="已完成")
                        <tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
                                <div>{{ $order->id}}</div>
                            </td>
							<td style="text-align: center">
                                <div>{{ $order->address}}</div>
                            </td>
							@foreach($users as $user)
							@if($user->id==$order->users_id)
							<td style="text-align: center">
                                <div>{{ $user->name}}</div>
                            </td>
							@endif
							@endforeach
							
                    
                    

                        <td class="table-text" style="text-align: center">
                                
                                   <div> <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary" role="button">查看</a></div>
                                
                        </td>
                    
	
                    
                

                        </tr>
						@endif
                    @endforeach
					
                    </tbody>
                </table>
            </div>
        </div>
    @endif
	
@endsection