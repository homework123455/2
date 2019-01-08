@extends('admin.layouts.master')

@section('title', '場地管理')

@section('content')
<!-- Page Heading -->

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
<form action="{{ route('admin.assets.search') }}" method="POST">
    {{ csrf_field() }}
    <span class="input-group-btn">
    <input name="Search" class="form-control" placeholder="Search...">
    <button class="btn btn-info"><i class="fa fa-search"></i></button>
    </span>
</form>
</div>
</div>
<div class="row" style="margin-bottom: 20px; text-align: right" >

    <div class="col-lg-12">

        <a href="{{ route('admin.assets.instascan') }}" class="btn btn-success">QR Code</a>
        @if(Auth::user()->previlege_id==3)
            <a href="{{ route('admin.assets.create') }}" class="btn btn-success">建立新場地</a>
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
                        	
                            	<th width="400" style="text-align: center">功能</th>                        
			@else
				<th width="120" style="text-align: center">場地編號</th>
                        	<th width="300" style="text-align: center">場地名稱</th>
                       	 	<th width="150" style="text-align: center">場地類別</th>
                            	<th width="200" style="text-align: center">地點</th>
                        	<th width="150" style="text-align: center">場地狀態</th>
                        	
                            	<th width="80" style="text-align: center">功能</th>                        
			@endif
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($assets as $asset)
                    <tr>
                        <td style="text-align: center">
                            {{ $asset->id }}
                        </td>
                        <td style="text-align: center">
                            <a href="{{ route('admin.assets.data', $asset->id) }}">{{ $asset->name }}</a>
                        </td>
                        <td style="text-align: center">
                            @foreach($categories as $category)
                                @if($asset->category==$category->id)
                                    {{ $category->name }}
                                @endif
                            @endforeach
                        </td>
                        <td style="text-align: center">{{ $asset->location }}</td>
                        <td style="text-align: center">{{ $asset->status }}</td>
                       

                        <td>
                            <table>
                                <tbody>
                                <tr class="table-text" style="text-align: center">
                                    @if(Auth::user()->previlege_id>=3)

    
                                            <td width="80" >
                                                @if($asset->status=='正常使用中'&&$asset->lendable==1)
                                                    <a class="btn btn-primary" role="button" href="{{ route('admin.lendings.create', $asset->id) }}" >借用</a>
                                                @else
                                                    <a class="btn btn-primary disabled" role="button" href="{{ route('admin.lendings.create', $asset->id) }}">借用</a>
                                                @endif
                                            </td>

                                        <td width="80">
                                        @if($asset->status=='租借中'||$asset->status=='正常使用中')
                                                @foreach($lendings as $lending)
                                                    @if($asset->id==$lending->asset_id)
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
                                                                                        <form action="{{ route('admin.lendings.return',['aid'=>$asset->id,'id'=>$lending->id]) }}" method="POST">
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
                                                <a class="btn btn-primary disabled" role="button">歸還</a>
                                            @endif
                                        </td>

                                        <td width="80" >
                                            @if((!($asset->status=='維修中')||$asset->status=='正常使用中'))
                                                <a class="btn btn-primary" role="button" href="{{ route('admin.assets.edit', $asset->id) }}" >修改</a>
                                            @else
                                                <a class="btn btn-primary    disabled" role="button" href="{{ route('admin.assets.edit', $asset->id) }}" >修改</a>
                                            @endif
                                        </td>

                                        <td width="80" >
                                            @if($asset->status=='正常使用中')
                                                <form action="{{ route('admin.assets.scrapped', $asset->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-danger">維修</button>
                                                </form>
                                            @endif
											@if($asset->status=='維修中')
                                                <form action="{{ route('admin.assets.scrapped1', $asset->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PATCH') }}
                                                    <button class="btn btn-danger">完成</button>
                                                </form>
                                            @endif
											@if($asset->status=='租借中')
                                                <a class="btn btn-danger disabled" role="button">維修</a>
                                                </form>
                                            @endif
											@if($asset->status=='申請中')
                                                <a class="btn btn-danger disabled" role="button">維修</a>
                                                </form>
                                            @endif
                                        </td>

                                        <td width="80">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                                刪除
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">提示訊息</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            確定刪除？
                                                        </div>
                                                        <div class="modal-footer">
                                                            <table style="text-align: right">
                                                                <tbody style="text-align: right">
                                                                <tr class="table-text" style="text-align: center">
                                                                    <td width="100" >
                                                                        <form action="{{ route('admin.assets.destroy', $asset->id) }}" method="POST">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn btn-danger">刪除</button>
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
                                        </td>


                                    @else

                                        <td width="80">
                                            @if($asset->status=='正常使用中')
                                                <a class="btn btn-primary" href="{{ route('admin.assets.application', $asset->id) }}" role="button" >租借</a>
                                            @else
                                                <a class="btn btn-primary disabled" href="{{ route('admin.assets.application', $asset->id) }}" role="button" >租借</a>
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
