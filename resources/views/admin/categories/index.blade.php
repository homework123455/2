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
<label>顯示全部：</label>  <form action="{{ route('admin.places.searchALL1') }}" method="POST">
{{ csrf_field() }}
<span class="input-group-btn">
<button class="btn btn-info"><i class="fa fa-search"></i></button>
    </span>
	</form>


	<label>商品類別查詢：</label>  <form action="{{ route('admin.places.search10') }}" method="POST">
    {{ csrf_field() }}

    <select name="week_search" class="form-control">
	<option value="">請選擇</option>
				
				 @foreach($categories as $category)
				 @if($category->id==123)
                 <option selected="true" value={{ $category->id }}>{{ $category->name }}</option>
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
				<th width="120" style="text-align: center">類別編號</th>
                        	<th width="300" style="text-align: center">類別名稱</th>
                       	 	
							<th width="150" style="text-align: center">創建時間</th>
							
                        	
                            	<th width="40" style="text-align: center">功能</th>                        
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
                                
                                       

                                        
	                                  
                                        <td class="table-text" style="text-align: center">
                                                                        <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger">刪除</button>
                                                                        </form>
                                              
                                        </td>
										
                                           
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
