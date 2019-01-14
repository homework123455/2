@extends('admin.layouts.master')

@section('title', '維修處理')

@section('content')
<!-- Page Heading -->

<div class="row">
    @if(!(Auth::user()->previlege_id>=3))
        <div class="col-sm-12">
            <h1 class="page-header">
                <small></small>
            </h1>
        </div>
    @endif

    <div class="col-lg-12">
        <h1 class="page-header">
            申請處理 <small>場地申請</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <div class="form-group">
            <label width="80">場地名稱：</label>
            <lable name="name">{{$place->name}}</lable>
        </div>

        <div class="form-group">
            <label width="80">負責人：</label>
            @foreach($users as $user)
                @if($place->keeper==$user->id)
            <lable name="keeper">{{$user->name}}</lable>
                @endif
                @endforeach
        </div>

        <div class="form-group">
            <label width="80">地點：</label>
            <lable name="location">{{$place->location}}</lable>
        </div>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-edit"></i> 申請資訊
            </li>
        </ol>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th width="100" style="text-align: center">申請人</th>
                    <th width="100" style="text-align: center">用途</th>
					<th width="100" style="text-align: center">是否租借器材</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td style="text-align: center">
                            @foreach($users as $user)
                                @if($application->user_id==$user->id)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                        </td>

                        <td style="text-align: center">{{ $application->problem }}</td>
						<td style="text-align: center">{{ $application->tool }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>


    @foreach($applications as $application)
                               @foreach($users as $user)
                                @if($application->user_id==$user->id)
                                    
                                
        @if(count($user_id) > 0)
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-edit"></i> 租借紀錄
                </li>
            </ol>
           	
    <div class="panel-group" id="accordion" role="tablist">
                <div class="panel panel-default">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
            <th width="120" style="text-align: center">場地編號</th>
                        	<th width="300" style="text-align: center">場地名稱</th>
							
                       	 	<th width="150" style="text-align: center">場地類別</th>
							<th width="100" style="text-align: center">申請狀態</th>
							 </tr>
                </thead>
                <tbody>
                @foreach($place1 as $place1)
                    <tr>
                        <td style="text-align: center">
                            {{ $place1->id }}
                        </td>
                        <td style="text-align: center">
                            <a href="{{ route('admin.places.data', $place1->id) }}">{{ $place1->name }}</a>
                        </td>
                        <td style="text-align: center">
                            @foreach($categories as $category)
                                @if($place1->category==$category->id)
                                    {{ $category->name }}
                                @endif
                            @endforeach
                        </td>
						<td style="text-align: center">
                            {{ $place1->status }}
                        </td>
						</tr>
						@endforeach
                      
        @endif
@endif
                            @endforeach
                      
                @endforeach
				</div>
				</div>
				</table>
				</div>
                <form action="/admin/maintainces/{{$maintaince->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label>選擇是否核准</label>
                <select name="method" class="form-control">
                        <option value="是">是</option>
                        <option value="否">否</option>
                      
                </select>
            </div>

                    

        <div class="text-right">
            <button type="submit" class="btn btn-success">確定</button>
            <a class="btn btn-success" href="{{ route('admin.maintainces.index') }}"  role="button">返回</a>
        </div>
        </form>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

       </div> 
   
</div>
<!-- /.row -->
@endsection
