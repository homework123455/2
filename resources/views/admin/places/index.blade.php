﻿@extends('admin.layouts.master')

@section('title', '商品管理')

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
                    商品管理 <small>所有商品列表</small>
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

 <label>商品名稱查詢：</label>  <form action="{{ route('admin.places.search10') }}" method="POST">
    {{ csrf_field() }}

    <select name="week_search" class="form-control">
	<option value="">請選擇</option>
				@foreach($weeks as $week)
				@if($week->id==$Search)
				 
                 <option selected="true" value={{ $week->id }} >{{ $week->week }}</option>
			 @else
				  <option  value={{ $week->id }}>{{ $week->week }}</option>
			  @endif
                    @endforeach
					</select>
					

<div>
 <label>商品類別查詢：</label>
    {{ csrf_field() }}
     <select name="category_search" class="form-control">
	 <option value="">請選擇</option>
                    @foreach($categories as $category)
					@if($category->id==$Search1)
                 <option selected="true" value={{ $category->id }}>{{ $category->name }}</option>
			 @else
				  <option value={{ $category->id }}>{{ $category->name }}</option>
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

        
        @if(Auth::user()->previlege_id==3)
            <a href="{{ route('admin.shops.create') }}" class="btn btn-success">建立新商品</a>
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
            			<th width="120" style="text-align: center">商品編號</th>
                        	<th width="300" style="text-align: center">商品名稱</th>
                       	 	<th width="150" style="text-align: center">商品類別</th>
                            	
                        	<th width="150" style="text-align: center">商品狀態</th>
                        	<th width="200" style="text-align: center">庫存</th>
                            	<th width="400" style="text-align: center">功能</th>                        
			@else
				<th width="120" style="text-align: center">商品編號</th>
                        	<th width="300" style="text-align: center">商品名稱</th>
                       	 	<th width="150" style="text-align: center">商品類別</th>
                            	
                        	<th width="150" style="text-align: center">商品狀態</th>
							<th width="200" style="text-align: center">庫存</th>
							
                        	
                            	<th width="80" style="text-align: center">功能</th>                        
			@endif
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($goods as $good)
                    <tr>
                        <td style="text-align: center">
                            {{ $good->id }}
                        </td>
                        <td style="text-align: center">
						@if(Auth::user()->previlege_id==3)
                         {{ $good->name }}
					 @else
						 <a href="{{ route('admin.places.data', $good->id) }}">{{ $good->name }}</a>
						 @endif
                        </td>
                        <td style="text-align: center">
                            @foreach($categories as $category)
                                @if($good->category==$category->id)
                                    {{ $category->name }}
                                @endif
                            @endforeach
                        </td>
                        <td style="text-align: center"> {{ $good->status}} </td>
						
                    
						
						<td style="text-align: center">{{ $good->stock}}</td>
                      

                        <td>
                            <table>
                                <tbody>
                                <tr class="table-text" style="text-align: center">
                                    @if(Auth::user()->previlege_id>=3)

    
                                            <td width="80" >
                                                
                                                    <a class="btn btn-primary" role="button" href="{{ route('admin.lendings.create', $good->id) }}" >下架</a>
                                                
                                            </td>

                                       

                                        <td width="80" >
                                           
                                                <a class="btn btn-primary" role="button" href="{{ route('admin.places.edit', $good->id) }}" >修改</a>
                                            
                                        </td>

                                        <td width="80" >
                                            @if($good->name=='正常使用中')
                                                <form action="{{ route('admin.places.scrapped', $good->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-danger">補貨</button>
                                                </form>
                                            @endif
											@if($good->name=='維修中')
                                                <form action="{{ route('admin.places.scrapped1', $good->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-danger">完成</button>
                                                </form>
                                            @endif
											
                                        </td>
	                                   @if($good->stock=='0')
                                        <td class="table-text" style="text-align: center">
                                                                        <form action="{{ route('admin.shops.destroy', $good->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger">刪除</button>
                                                                        </form>
                                              
                                        </td>
										@else
										<td class="table-text" style="text-align: center">
                                                                        <form action="{{ route('admin.places.destroy', $good->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger disabled">刪除</button>
                                                                        </form>
                                           
                                        </td>
											@endif

                                    
                                    @endif
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
