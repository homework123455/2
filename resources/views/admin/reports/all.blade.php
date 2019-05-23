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

                




			<table class="table table-bordered table-hover">
                <thead>
                                         

                        <th width="200" style="text-align: center"><a href="{{route('admin.reports.all.sort1',['id'=>'id'])}}">商品編號<a></th>
						<th width="300" style="text-align: center">商品名稱</th>
						 <th width="300" style="text-align: center"><a href="{{route('admin.reports.all.sort1',['id'=>'earn'])}}">收益<a></th>
						  <th width="300" style="text-align: center"><a href="{{route('admin.reports.all.sort1',['id'=>'trade'])}}">交易數量<a></th>
						  

                        <th width="200" style="text-align: center">功能</th>                        

                </thead>
				
				
				<tbody> 
				@foreach($reports as $report)
						<tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
							{{$report->good_id}}
								
						
                            </td>
							 <td style="text-align: center">
                                @foreach($goods as $good)
								@if($good->id==$report->good_id)
								{{$good->name}}
							@endif
							@endforeach
								
						
                            </td>
							<td style="text-align: center">
                                
								{{$report->earn}}
						
                            </td>
							<td style="text-align: center">
                                
								{{$report->trade}}
						
                            </td>
				
                        <td class="table-text" style="text-align: center">

                                 <a href="{{ route('admin.reports.index1', $id=$report->id) }}" class="btn btn-primary" role="button"  >查看</a>
												
                                
                        </td>
						
						
                    
	
                    
                

                        </tr>
@endforeach
						
             
                </tbody>

            </table>
							

        </div>
    </div>
	{!! $reports->render() !!}
</div>

</div>

</div>




<!-- /.row -->

@endsection
