@extends('admin.layouts.master')

@section('title', '場地資料')

@section('content')
<!-- Page Heading -->
@if(!(Auth::user()->previlege_id>=3))
    <div class="col-sm-12">
        <h1 class="page-header">
            <small></small>
        </h1>
    </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            場地 <small>場地資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-xs-6">
            <div class="form-group">
                <label width="80">場地名稱：</label>
                <label name="name">{{$asset->name}}</label>
            </div>



        <div class="form-group">
            <label width="80">場地圖片：</label>
            <img src={{ $asset->file1}} width="500px" height="300px"/>

        </div>

        <div class="form-group">
            <label width="80">場地類別：</label>
                    <label name="category">{{$category->name}}</label>
        </div>

            <div class="form-group">
                <label width="80">購置日期：</label>
                <label name="date">{{$asset->date}}</label>
            </div>

        @if(Auth::user()->previlege_id==3)
            <div class="form-group">
                <label width="80">成本：</label>
                <label name="cost">{{$asset->cost}}</label>
            </div>
        @endif

            <div class="form-group">
                <label width="80">場地狀態：</label>
                @if($asset->status=='正常使用中')
                    <label name="status">{{$asset->status}}</label>
                    @else
                <label name="status"><font color="#FF0000"  size="+2">{{$asset->status}}</font></label>
            @endif
            </div>

            <div class="form-group">
                <label width="80">保管人：</label>
                <label name="keeper">{{$user->name}}</label>
            </div>

            <div class="form-group">
                <label width="80">可否租借：</label>
                    <label name="lendable">
                        @if($asset->lendable)
                        是
                        @else
                            <lable name="lendable">否</lable>
                        @endif
                    </label>
            </div>

            <div class="form-group">
                <label width="80">放置地點：</label>
                <label name="location">{{$asset->location}}</label>
            </div>

            <div class="form-group">
                <label width="80">耐用年限：</label>
                <label name="warranty">{{$asset->warranty}}</label>
            </div>

            <div class="form-group">
                <label width="80">備註：</label>
                <lable name="warranty">{{$asset->remark}}</lable>
            </div>
    </div>
    @if(Auth::user()->previlege_id>=3)
    <div class="col-sm-6">
        {!! QrCode::size(200)->generate('https://140.128.80.195/admin/assets/'.$asset->id.'/data' ) !!}
    </div>
    @endif
    <div class="col-xs-12">
                    <table>
                        <tbody>
                        <tr class="table-text"  style="text-align: center">
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.assets.index') }}"  role="button">返回</a>
                            </td>
                            @if(Auth::user()->previlege_id==3)
                                <td width="80">
                                    @if($asset->status=='正常使用中')
                                        <a class="btn btn-primary" href="{{ route('admin.assets.application', $asset->id) }}" role="button" >報修</a>
                                    @else
                                        <a class="btn btn-primary disabled" href="{{ route('admin.assets.application', $asset->id) }}" role="button" >報修</a>
                                    @endif
                                </td>

                                <td width="80">
                                    @if($asset->status=='正常使用中'&&$asset->lendable==1)
                                        <a class="btn btn-primary" role="button" href="{{ route('admin.lendings.create', $asset->id) }}" >借用</a>
                                    @else
                                        <a class="btn btn-primary disabled" role="button" href="{{ route('admin.lendings.create', $asset->id) }}">借用</a>
                                    @endif
                                </td>

                                <td width="80">
                                @if($asset->status=='租借中')
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

                                <td width="80">
                                    @if((!($asset->status=='已報廢'||$asset->status=='待報廢')||$asset->status=='正常使用中'))
                                        <a class="btn btn-primary" role="button" href="{{ route('admin.assets.edit', $asset->id) }}" >修改</a>
                                    @else
                                        <a class="btn btn-primary    disabled" role="button" href="{{ route('admin.assets.edit', $asset->id) }}" >修改</a>
                                    @endif
                                </td>

                                <td >
                                    @if($asset->status=='待報廢')
                                        <form action="{{ route('admin.assets.scrapped', $asset->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                            <button class="btn btn-danger">報廢</button>
                                        </form>
                                    @else
                                        <a class="btn btn-danger disabled" role="button">報廢</a>
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
                                        <a class="btn btn-primary" href="{{ route('admin.assets.application', $asset->id) }}" role="button" >報修</a>
                                    @else
                                        <a class="btn btn-primary disabled" href="{{ route('admin.assets.application', $asset->id) }}" role="button" >報修</a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                        </tbody>
                    </table>

        <p>&nbsp;</p>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 過去維修紀錄
            </li>
        </ol>
        @if(count($assetmaintainces)>0)
            <div class="panel-group" id="accordion" role="tablist">
                <div class="panel panel-default">
                    @foreach($assetmaintainces as $assetmaintaince)
                        <div class="panel-heading" role="tab" id="heading{{$assetmaintaince->id}}">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$assetmaintaince->id}}" aria-expanded="false>"
                                   aria-controls="collapse{{$assetmaintaince->id}}">
                                    維修紀錄  {{$assetmaintaince->date}}
                                </a>
                            </h4>
                        </div>

                        <div id="collapse{{$assetmaintaince->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$assetmaintaince->id}}">

                            <div class="panel-body">
                                <table class="table table-striped task-table">
                                    <!-- 表頭 -->
                                    <thead>
                                    <th width="100" style="text-align: center">維修項目</th>
                                    <th width="100" style="text-align: center">金額</th>
                                    </thead>
                                @foreach($maintainceitems as $maintainceitem)
                                    @if($assetmaintaince->id==$maintainceitem->maintaince_id)
                                        <!-- 表身 -->
                                            <tbody>
                                            <tr>
                                                <!-- 任務名稱 -->
                                                <td class="table-text" style="text-align: center">
                                                    <div>{{ $maintainceitem->name }}</div>
                                                </td>
                                                <td class="table-text" style="text-align: center">
                                                    <div>{{ $maintainceitem->amount }}</div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="panel-group" id="accordion" role="tablist">
                <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading">
                            <h4 class="panel-title">
                                    無維修紀錄
                            </h4>
                        </div>
                </div>
            </div>

        @endif


        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>

</div>
<!-- /.row -->
@endsection
