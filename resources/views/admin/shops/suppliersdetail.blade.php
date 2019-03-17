@extends('admin.layouts.master')

@section('title', '進貨管理')

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
                
                   進貨管理 <small>所有進貨資訊</small>
               
            </h1>
        </div>
    </div>
<!-- /.row -->
<div class="input-group custom-search-form">
<label>顯示全部：</label>  <form action="{{ route('admin.shops.suppliersdetail.searchALL') }}" method="POST">
{{ csrf_field() }}
<span class="input-group-btn"><button class="btn btn-info"><i class="fa fa-search"></i></button> </span>
</form>
   
	

 <label>商品名稱查詢：</label>  <form action="{{ route('admin.shops.suppliersdetail.search1') }}" method="POST">
    {{ csrf_field() }}

    <select name="good_search" class="form-control">
	<option value="">請選擇</option>
				@foreach($goods as $good)
				@if($good->id==$Search)
				 
                 <option selected="true" value={{ $good->id }} >{{ $good->name }}</option>
			 @else
				  <option  value={{ $good->id }}>{{ $good->name }}</option>
			  @endif
                    @endforeach
					</select>
					

<div>
 <label>供應商查詢：</label>
    {{ csrf_field() }}
     <select name="supplier_search" class="form-control">
	 <option value="">請選擇</option>
                    @foreach($suppliers as $supplier)
					@if($supplier->id==$Search1)
                 <option selected="true" value={{ $supplier->id }}>{{ $supplier->name }}</option>
			 @else
				  <option value={{ $supplier->id }}>{{ $supplier->name }}</option>
			  @endif
                    
                    @endforeach
                </select>
        </div>
        <span class="input-group-btn">
            <button class="btn btn-info"><i class="fa fa-search"></i></button>
        </span>
</form>

</div>



</div>
<div class="row" style="margin-bottom: 20px; text-align: right" >

    <div class="col-lg-12">

        
       
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
            			<th width="120" style="text-align: center">編號</th>
                        	<th width="300" style="text-align: center">產品名稱</th>
                       	 	
                        	<th width="150" style="text-align: center">供應商名稱</th>
                            	<th width="400" style="text-align: center">進貨數量</th>
								<th width="400" style="text-align: center">進貨價格</th>
								<th width="400" style="text-align: center">進貨時間</th>
								
								
			@else
				<th width="220" style="text-align: center">供應商編號</th>
                        	<th width="100" style="text-align: center">供應商名稱</th>
                       	 	
							<th width="250" style="text-align: center">創建時間</th>
							
                        	
                            	<th width="30" style="text-align: center">功能</th>                        
			@endif
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($suppliersdetails as $suppliersdetail)
                    <tr>
                        <td style="text-align: center">
                            {{ $suppliersdetail->id }}
                        </td>
                        <td style="text-align: center">
						@foreach($goods as $good)
						@if($suppliersdetail->name==$good->id)
                         {{ $good->name }}
						 @endif
						 @endforeach
					 
                        </td>
						<td style="text-align: center">
						@foreach($suppliers as $supplier)
						@if($supplier->id==$suppliersdetail->supplier_id)
                         {{ $supplier->name }}
					 @endif
						 @endforeach
                        </td>
						<td style="text-align: center">
						
                         {{ $suppliersdetail->value }}
					 
                        </td>
						<td style="text-align: center">
						
                         {{ $suppliersdetail->price }}
					 
                        </td>
                        
                        <td style="text-align: center">
						{{ $suppliersdetail->created_at }}
						</td>
						
                @endforeach
                </tbody>
            </table>
</div>
        </div>
		{!! $suppliersdetails->links() !!}
    </div>
</div>
<!-- /.row -->
@endsection
