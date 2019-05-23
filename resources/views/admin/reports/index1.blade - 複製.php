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
@foreach($reports as $report)
@foreach($goods as $good )
@if($good->id==$report->good_id)
    <div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#{{ $report->good_id }}">
				   <i class="fa fa-user"></i>{{ $good->name }}<span class="badge"></span></a>
				
			</h4>
		</div>
<div id="{{ $report->good_id }}" class="panel-collapse collapse in">
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
					
                        <div> {{ $report->good_id }}</div>
					 
                        </td>
                        
                        <td style="text-align: center">
						<div>{{ $good->name }}</div>
						</td>
						 <td style="text-align: center">
						<div>{{ $good->status }}</div>
						</td>
						 <td style="text-align: center">
						<div>{{ $report->earn }}</div>
						</td>
						 <td style="text-align: center">
						<div>{{ $report->trade }}</div>
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

                        <th width="400" style="text-align: center">功能</th>                        

                </thead>
				@foreach($months as $month)
				@if($report->good_id==$month->good_id)
				<tbody> 
				
						<tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
                                
								{{$month->month}}
						
                            </td>
							<td style="text-align: center">
                                
								{{$month->earn}}
						
                            </td>
				
                        <td class="table-text" style="text-align: center">

                                 <a class="btn btn-primary" role="button"  >查看</a>
												
                                
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
@endforeach
</div>


{!! $reports->render() !!}

<!-- /.row -->
<script type="text/javascript">
var a =<?php echo $a ?>';
	$(function () { $('#'a).collapse('toggle')});

</script>
@endsection
