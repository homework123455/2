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
            過往訂單 <small></small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
             <div class="table-responsive">
            <table class="table table-bordered table-hover">

                    <!-- 表頭 -->
                    <thead>
					<th style="text-align:center">訂單編號</th>
                    
					<th style="text-align:center">會員姓名</th>
                  <th style="text-align:center">訂單時間</th>
                    </thead>

                    <!-- 表身 -->
                    <tbody>


                        <tr>
                            <!-- 任務名稱 -->
@foreach($orders as $order)
                            <td style="text-align: center">
                                <div>{{$order->id}}</div>
                            </td>
							
								 <td style="text-align: center"><font color="#FF0000"  >
                                <div>{{$order->name}}</div>
                            </td>
							
							<td style="text-align: center">
                                <div>{{$order->updated_at}}</div>
                            </td>
						

                    
                        </tr>
			@endforeach		
					
                    </tbody>
                </table>
            </div>
			 <div class="text-right">
          
            <a class="btn btn-success" href="{{ route('orders.show',$order->id) }}"  role="button">返回</a>
        </div>
       </div> 
   
</div>
<!-- /.row -->
@endsection
