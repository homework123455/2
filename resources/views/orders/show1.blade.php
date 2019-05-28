@extends('admin.layouts.master')

@section('title', '訂單處理')

@section('content')
<!-- Page Heading -->

<div class="row">
    @if(!(Auth::user()->previlege_id>=3))
        <div class="col-sm-12">
            <h1 class="page-header">
                <small></small>
            </h1>
        </div>
    @endif

    <div class="col-lg-12">
        <h1 class="page-header">
            訂單處理 <small>訂單處理</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
       
        <div class="form-group">
            <label width="80">訂單編號：</label>
			{{$order->id}}
        </div>
		<div class="form-group">
            <label width="80">會員姓名：</label>
			@foreach($users as $user)
			@if($order->users_id==$user->id)
			{{$user->name}}
		@endif
		@endforeach

           
        </div>

		<div class="form-group">
            <label width="80">商品總價：</label>

			{{$ordertotal}}
        </div>
		@if($order->car_money==0)
		<div class="form-group">
            <label width="80">運費：</label>
			0
        </div>
		@elseif($order->car_money==1)
		<div class="form-group">
            <label width="80">運費：</label>
			{{$price}}
        </div>
		@endif
		@if($order->vip_check==1)
		<div class="form-group">
            <label width="80">折扣後金額：</label>
			{{$vip_total}}
        </div>
		@endif

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 訂單資訊
            </li>
        </ol>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    
					<th width="100" style="text-align: center">商品名稱</th>
					<th width="100" style="text-align: center">商品數量</th>
					<th width="100" style="text-align: center">商品單價</th>
                    <th width="100" style="text-align: center">下單時間</th>
					@if($order->status=="已出貨"||$order->status=="已完成")
					<th width="100" style="text-align: center">出貨日期</th>
				    @elseif($order->status=="駁回")
					<th width="100" style="text-align: center">駁回時間</th>
					
					
					@endif
					<th width="100" style="text-align: center">訂單狀態</th>
					@if((Auth::user()->previlege_id==1))
					@if($order->status=="已出貨")
						
					<th width="100" style="text-align: center">功能</th>
					@endif
				@endif
                </tr>
                </thead>
                <tbody>
                
                    <tr>
					@foreach($ordersdetail as $order1)
                        <td style="text-align: center">{{$order1->product}}</td>
                          <td style="text-align: center">{{$order1->qty}}</td>  
                         <td style="text-align: center">{{$order1->cost}}</td>
						 

                        <td style="text-align: center">{{$order->created_at}}</td>
						@if($order->status=="已出貨"||$order->status=="已完成")
						<td style="text-align: center">{{$order->buytime}}</td>
					@elseif($order->status=="駁回")
					<td style="text-align: center">{{$order->updated_at}}</td>
					@endif
					@if($order1->status !='')
						<td style="text-align: center"><font color="#FF0000" >{{$order1->status}}</td> 
					@else
						<td style="text-align: center">{{$order->status}}</td>
					@endif
						@if((Auth::user()->previlege_id==1))
							@if($order->status=="已出貨"&&$order1->status!="退貨中"&&$order1->status!="已退貨"&&$order1->status!="拒絕退貨")
						
					<td class="table-text" style="text-align: center">
                                
                                   <div> <a href="{{ route('orders.back',['product_id'=>$order1->product_id,'id'=>$order->id]) }}" class="btn btn-primary" role="button">退貨</a></div>
                                
                        </td>
						@elseif($order->status=="已出貨"&&$order1->status=="退貨中")
						<td class="table-text" style="text-align: center">
                                
                                   <div> <a class="btn btn-primary" role="button" disabled>退貨</a></div>
                                
                        </td>
						@elseif($order->status=="已出貨"&&$order1->status=="已退貨")
						<td class="table-text" style="text-align: center">
                                
                                   <div> <a class="btn btn-primary" role="button" disabled>退貨</a></div>
                                
                        </td>
						@elseif($order->status=="已出貨"&&$order1->status=="拒絕退貨")
						<td class="table-text" style="text-align: center">
                                
                                   <div> <a class="btn btn-primary" role="button" disabled>退貨</a></div>
                                
                        </td>
					@endif
				@endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


        
                                    
                                
       
 @if($order->status=="駁回"||$order->status=="已處理")

               <div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">駁回原因</h3>
    </div>
    <div class="panel-body">
	{{$order->reason}}
    </div>
		
			    
</div>
@elseif($order1->status=="拒絕退貨")
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">駁回原因</h3>
    </div>
    <div class="panel-body">
	{{$order1->backreason1}}
    </div>
@endif

            </div>

                    

        <div class="text-right">
		

        @if((Auth::user()->previlege_id>=3))
			@if($order->status=="處理中")
			<form action="{{ route('orders.scrapped', $order->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-success">出貨</button>
													 <a class="btn btn-success" href="{{ route('orders.index') }}"  role="button">返回</a>
                                                </form>
												@else
            <a class="btn btn-success" href="{{ route('orders.index') }}"  role="button">返回</a>
		@endif
		@else
			<a class="btn btn-success" href="{{ route('admin.dashboard.index') }}"  role="button">返回</a>
		@endif
        </div>
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

       </div> 
   
</div>
<!-- /.row -->
@endsection
