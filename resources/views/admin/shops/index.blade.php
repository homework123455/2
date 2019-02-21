@extends('admin.layouts.master')

@section('title', '場地管理')

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
                    場地管理 <small>所有場地列表</small>
                @else
                    查詢場地 <small>查詢場地列表</small>
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

 <label>星期查詢：</label>  <form action="{{ route('admin.places.search10') }}" method="POST">
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
<label>時段查詢：</label>
    {{ csrf_field() }}

    <select name="time_search" class="form-control">
	<option value="" >請選擇</option>
				@foreach($times as $time)
				@if($time->id==$Search2)
                    <option  selected="true" value={{ $time->id }}>{{ $time->time_start}} ~ {{$time->time_end}}</option>
				@else
				  <option  value={{ $time->id }}>{{ $time->time_start}} ~ {{$time->time_end}}</option>
			  @endif
                    @endforeach
					</select>
</div>
<div>
 <label>場地類別查詢：</label>
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
            <a href="{{ route('admin.places.create') }}" class="btn btn-success">建立新場地</a>
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
            			<th width="120" style="text-align: center">場地編號</th>
                        	<th width="300" style="text-align: center">場地名稱</th>
                       	 	<th width="150" style="text-align: center">場地類別</th>
                            	<th width="200" style="text-align: center">地點</th>
                        	<th width="150" style="text-align: center">場地狀態</th>
                        	<th width="150" style="text-align: center">開放時段</th>
                            	<th width="400" style="text-align: center">功能</th>                        
			@else
				<th width="120" style="text-align: center">場地編號</th>
                        	<th width="300" style="text-align: center">場地名稱</th>
                       	 	<th width="150" style="text-align: center">場地類別</th>
                            	<th width="200" style="text-align: center">地點</th>
                        	<th width="150" style="text-align: center">場地狀態</th>
							<th width="150" style="text-align: center">開放時段</th>
							
                        	
                            	<th width="80" style="text-align: center">功能</th>                        
			@endif
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($places as $place)
                    <tr>
                        <td style="text-align: center">
                            {{ $place->id }}
                        </td>
                        <td style="text-align: center">
						@if(Auth::user()->previlege_id==3)
                         {{ $place->name }}
					 @else
						 <a href="{{ route('admin.places.data', $place->id) }}">{{ $place->name }}</a>
						 @endif
                        </td>
                        <td style="text-align: center">
                            @foreach($categories as $category)
                                @if($place->category==$category->id)
                                    {{ $category->name }}
                                @endif
                            @endforeach
                        </td>
                        <td style="text-align: center">{{ $place->location }}</td>
						@if($place->status =='正常使用中')
                    <td style="text-align: center"><font color="#01DF3A"  >{{ $place->status }}</font></td>
                    @elseif($place->status =='租借中')
                    <td style="text-align: center"><font color="#FF0000"  >{{ $place->status }}</font></td>
					@else
						<td style="text-align: center"><font color="#FF8000"  >{{ $place->status }}</font></td>
                     @endif
						@foreach($times as $time)
						@foreach($weeks as $week)
						@if($place->time_id==$time->id)
							@if($place->week_id==$week->id)
						<td style="text-align: center">{{ $week->week}} {{ $time->time_start}} ~ {{$time->time_end}}</td>
                       @endif
					   @endif
					   @endforeach
					   @endforeach

                        <td>
                            <table>
                                <tbody>
                                <tr class="table-text" style="text-align: center">
                                    @if(Auth::user()->previlege_id>=3)

    
                                            <td width="80" >
                                                @if($place->status=='正常使用中'&&$place->lendable==1)
                                                    <a class="btn btn-primary" role="button" href="{{ route('admin.lendings.create', $place->id) }}" >借用</a>
                                                @else
                                                    <a class="btn btn-primary disabled" role="button" href="{{ route('admin.lendings.create', $place->id) }}">借用</a>
                                                @endif
                                            </td>

                                        <td width="80">
                                        @if($place->status=='租借中'||$place->status=='正常使用中')
                                                @foreach($lendings as $lending)
                                                    @if($place->id==$lending->place_id)
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                                                                歸還
                                                            </button>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="myModalLabel">提示訊息</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            確定歸還？
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <table style="text-align: right">
                                                                                <tbody style="text-align: right">
                                                                                <tr class="table-text" style="text-align: center">
                                                                                    <td width="100" >
                                                                                        <form action="{{ route('admin.lendings.return',['aid'=>$place->id,'id'=>$lending->id]) }}" method="POST">
                                                                                            {{ csrf_field() }}
                                                                                            {{ method_field('PATCH') }}
                                                                                            <button class="btn btn-danger">歸還</button>
                                                                                        </form>
                                                                                    </td>
                                                                                    <td width="100">
                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>	
															 
                                                    @endif
                                                @endforeach
												
                                            @else
												
												@foreach($maintainces as $maintaince)
												@if($maintaince->place_id==$place->id)
												<a href="{{ route('admin.maintainces.show', $maintaince->id) }}"  class="btn btn-success" role="button">處理</a>
                                                            <!-- Modal -->
                                                           
                                            </td>
                                            @endif
											@endforeach
                                        
                                        @endif  
                                       

                                        <td width="80" >
                                            @if(($place->status=='正常使用中'))
                                                <a class="btn btn-primary" role="button" href="{{ route('admin.places.edit', $place->id) }}" >修改</a>
                                            @else
                                                <a class="btn btn-primary    disabled" role="button" href="{{ route('admin.places.edit', $place->id) }}" >修改</a>
                                            @endif
                                        </td>

                                        <td width="80" >
                                            @if($place->status=='正常使用中')
                                                <form action="{{ route('admin.places.scrapped', $place->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-danger">維修</button>
                                                </form>
                                            @endif
											@if($place->status=='維修中')
                                                <form action="{{ route('admin.places.scrapped1', $place->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-danger">完成</button>
                                                </form>
                                            @endif
											@if($place->status=='租借中')
                                                <a class="btn btn-danger disabled" role="button" >維修</a>
                                                </form>
                                            @endif
											@if($place->status=='申請中')
                                                <a class="btn btn-danger disabled" role="button">維修</a>
                                                </form>
                                            @endif
                                        </td>
	                                   @if($place->status=='正常使用中')
                                        <td class="table-text" style="text-align: center">
                                                                        <form action="{{ route('admin.places.destroy', $place->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger">刪除</button>
                                                                        </form>
                                              
                                        </td>
										@else
										<td class="table-text" style="text-align: center">
                                                                        <form action="{{ route('admin.places.destroy', $place->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger disabled">刪除</button>
                                                                        </form>
                                           
                                        </td>
											@endif
@else
                                            <td width="80" >
                                            @if($place->status=='正常使用中')
                                                <a class="btn btn-primary" href="{{ route('admin.places.application', $place->id) }}" role="button" >租借</a>
                                            @else
                                                <a class="btn btn-primary disabled" href="{{ route('admin.places.application', $place->id) }}" role="button" >租借</a>
                                            @endif
                                        </td>
                                    
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
