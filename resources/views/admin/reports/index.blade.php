@extends('admin.layouts.master')

@section('title', '商品類別管理')

@section('content')
<!-- Page Heading -->


<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">
           <small></small>
        </h1>
    </div>
<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                
                   每月報表管理 <small>所有商品收益</small>
               
            </h1>
        </div>
    </div>
<!-- /.row -->


</div>

<!-- /.row -->

<div class="row">

@foreach($goods as $good )
@if($good->id==$reports->good_id)
    
	<div class="panel panel-default">
		<div class="panel-heading">
			
		

			<div class="panel-body">
           <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                                         

                        <th width="300" style="text-align: center">商品編號</th>
						<th width="300" style="text-align: center">商品名稱</th>
						<th width="300" style="text-align: center">商品狀態</th>
						<th width="300" style="text-align: center">本月商品收益</th>
                        <th width="150" style="text-align: center">本月交易數量</th>
                                                

                </thead>
                <tbody>
                
<tr class="success">

	
                       
                        <td style="text-align: center">
					
                        <div> {{ $reports->good_id }}</div>
					 
                        </td>
                        
                        <td style="text-align: center">
						<div>{{ $good->name }}</div>
						</td>
						 <td style="text-align: center">
						<div>{{ $good->status }}</div>
						</td>
						 <td style="text-align: center">
						<div>{{ $reports->earn }}</div>
						</td>
						 <td style="text-align: center">
						<div>{{ $reports->trade }}</div>
						</td>

						</tr>

                       

               
                </tbody>
            </table>
@endif
@endforeach

			<table class="table table-bordered table-hover">
                <thead>
                                         

                        <th width="300" style="text-align: center">月份</th>
						 <th width="300" style="text-align: center">收益</th>
						 <th width="300" style="text-align: center">交易數</th>
                       

                </thead>
				@foreach($months as $month)
				@if($reports->good_id==$month->good_id)
				<tbody> 
				
						<tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
                                
								{{$month->month}}
						
                            </td>
							<td style="text-align: center">
                                
								{{$month->earn}}
						
                            </td>
							<td style="text-align: center">
                                
								{{$month->trade}}
						
                            </td>
				
                       
						
						
                    
	
                    
                

                        </tr>

						
             
                </tbody>
				@endif
@endforeach
            </table>
						 
</div>
        </div>
		
    </div>
	
</div>
 
</div>

<a class="btn btn-success" style="center" href="javascript:window.history.go(-1);"  role="button">返回</a>	




<!-- /.row -->

@endsection
