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
                @if(Auth::user()->previlege_id==3)
                    商品類別管理 <small>所有商品類別</small>
                @else
                    查詢商品 <small>查詢商品列表</small>
                @endif
            </h1>
        </div>
    </div>
<!-- /.row -->
<div class="input-group custom-search-form">
<label>顯示全部：</label>  <form action="{{ route('admin.categories.searchALL1') }}" method="POST">
{{ csrf_field() }}
<span class="input-group-btn">
<button class="btn btn-info"><i class="fa fa-search"></i></button>
    </span>
	</form>


	<label>商品類別查詢：</label>  <form action="{{ route('admin.categories.search2') }}" method="POST">
    {{ csrf_field() }}

    <select name="category_search" class="form-control">
	<option value="">請選擇</option>
				
				 @foreach($categories1 as $category)
				 @if($category->id==$Search1)
                 <option selected="true" value={{ $category->id }}>{{ $category->name }}</option>
			 @else
				 <option  value={{ $category->id }}>{{ $category->name }}</option>
			  @endif
			@endforeach
					</select>				


        <span class="input-group-btn">
            <button class="btn btn-info"><i class="fa fa-search"></i></button>
        </span>
</form>

</div>

</div>
<div class="row" style="margin-bottom: 20px; text-align: right" >

    <div class="col-lg-12">

        
        @if(Auth::user()->previlege_id==3)
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">建立新商品類別</a>
        @endif
    </div>

</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
	<div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        @if(Auth::user()->previlege_id==3)
            			<th width="120" style="text-align: center">類別編號</th>
                        	<th width="300" style="text-align: center">類別名稱</th>
                       	 	
                        	<th width="150" style="text-align: center">創建時間</th>
                            	<th width="400" style="text-align: center">功能</th>                        
			@else
				<th width="220" style="text-align: center">類別編號</th>
                        	<th width="100" style="text-align: center">類別名稱</th>
                       	 	
							<th width="250" style="text-align: center">創建時間</th>
							
                        	
                            	<th width="30" style="text-align: center">功能</th>                        
			@endif
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $categorie)
                    <tr>
                        <td style="text-align: center">
                            {{ $categorie->id }}
                        </td>
                        <td style="text-align: center">
						
                         {{ $categorie->name }}
					 
                        </td>
                        
                        <td style="text-align: center">
						{{ $categorie->created_at }}
						</td>
						

                        <td>
                            <table>
                                <tbody>
    <?php
	
	$link=mysqli_connect("localhost:33060","root","root","homestead");
	$sql ="SELECT * FROM goods WHERE category='$categorie->id'";
	$rec = $link->query($sql);	
	$rNum = $rec->num_rows;
	$rs = $rec->fetch_array();
	$S1=$rs['id'];
	//echo "$S1"; 
	if(isset($S1)){
		
		$sql1 ="SELECT * FROM ordersdetail WHERE product_id ='$S1'";
		$rec1 = $link->query($sql1);	
	    $rNum1 = $rec1->num_rows;
		$rs1 = $rec1->fetch_array();
	    $S2=$rs1['id'];
		//echo "$rNum1";
		if(isset($S2)){
			$i=1;
		}
	}
	else{
		$i=0;
	}
		
	
	
	
	?>

                                       <td width="80" >
                                           
                                                <a class="btn btn-primary" role="button" href="{{ route('admin.categories.edit', $categorie->id) }}" >修改</a>
                                            
                                        </td>
                                        
	                                    @if($i=="0")
                                        <td class="table-text" style="text-align: center">
                                                                        <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger ">刪除</button>
                                                                        </form>
                                              
                                        </td>
										@elseif($i=="1")
											<td class="table-text" style="text-align: center">
                                                                        
                                                                            <button class="btn btn-danger disabled"  >刪除</button>
                                                                        
                                              
                                        </td>
										@endif
                                        </td>
											
                                            
                                            
                                    
                                    
                                </tr>
                                </tbody>
                            </table>
                        </td>

                @endforeach
                </tbody>
            </table>
</div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection
