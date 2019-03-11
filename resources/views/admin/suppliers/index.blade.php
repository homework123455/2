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
                
                   供應商管理 <small>所有供應商資訊</small>
               
            </h1>
        </div>
    </div>
<!-- /.row -->


</div>
<div class="row" style="margin-bottom: 20px; text-align: right" >

    <div class="col-lg-12">

        
        @if(Auth::user()->previlege_id==3)
            <a href="{{ route('admin.suppliers.create') }}" class="btn btn-success">建立新供應商</a>
        @endif
    </div>

</div>
<!-- /.row -->

<div class="row">
@foreach($suppliers as $supplier)
    <div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				   href="#{{ $supplier->name }}">
				   
				 
					<i class="fa fa-edit"></i>{{ $supplier->name }}<span class="badge"></span>
					
				</a>
			</h4>
		</div>
<div id="{{ $supplier->name }}" class="panel-collapse collapse in">
			<div class="panel-body">
           <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                                         

                        <th width="300" style="text-align: center">供應商名稱</th>
                        <th width="150" style="text-align: center">創建時間</th>
                        <th width="400" style="text-align: center">功能</th>                        

                </thead>
                <tbody>
                

                       
                        <td style="text-align: center">
					
                        <div> {{ $supplier->name }}</div>
					 
                        </td>
                        
                        <td style="text-align: center">
						<div>{{ $supplier->created_at }}</div>
						</td>
						

                        <td>
                            <table>
                                <tbody>
							
  <?php
	$link=mysqli_connect("localhost:33060","root","root","homestead");
	$sql ="SELECT * FROM goods WHERE supplier_id='$supplier->id'";
	$rec = $link->query($sql);	
	$rNum = $rec->num_rows;
	$rs = $rec->fetch_array();
	$S1=$rs['id'];
	//echo "$S1"; 
	if(isset($S1)){

			$i=1;

	}
	else{
		$i=0;
	}
		?>
	
	
	

	


                                        
	                                 
									  @if($i=="0")
                                        <td class="table-text" style="text-align: center">
                                                                        <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger ">刪除</button>
                                                                        </form>
                                              
                                        </td>
										@elseif($i=="1")
											<td class="table-text" style="text-align: center">
                                                                        <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger disabled" >刪除</button>
                                                                        </form>
                                              
                                        </td>
										@endif
										
                                        </td>
											
                                            
                                            
                                    
                                    

                                </tbody>
                            </table>
                        </td>

               
                </tbody>
            </table>


			<table class="table table-bordered table-hover">
                <thead>
                                         

                        <th width="300" style="text-align: center">商品名稱</th>

                        <th width="400" style="text-align: center">功能</th>                        

                </thead>
				<tbody> 
				@foreach($goods as $good)
				
					@if($supplier->id == $good->supplier_id)
						<tr>
                            <!-- 任務名稱 -->
                            <td style="text-align: center">
                                <div>{{ $good->name}}</div>
                            </td>


                        <td class="table-text" style="text-align: center">

                                  <form action="" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    
													<a href="" class="btn btn-primary" role="button">查看</a>
                                                </form>
												
                                
                        </td>
                    
	
                    
                

                        </tr>

							@endif			
               @endforeach
                </tbody>
            </table>	
</div>
        </div>
    </div>
</div>
</div>

</div>

@endforeach
<!-- /.row -->
<script type="text/javascript">
var a =<?php echo $a ?>';
	$(function () { $('#'a).collapse('toggle')});

</script>
@endsection
