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
			
        <a href="{{ route('admin.places.index') }}" class="btn btn-success" style="margin-bottom: 20px; text-align: right">返回</a>
		@if($place->status=='正常使用中')
			<a href="{{ route('admin.places.application', $place->id) }}" class="btn btn-success" style="margin-bottom: 20px; text-align: right">租借</a>
		@endif
		
                       
						   
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
                <label name="name">{{$place->name}}</label>
            </div>



        <div class="form-group">
            <label width="80">場地圖片：</label>
            <img src={{ $place->file}} width="500px" height="300px"/>

        </div>

        <div class="form-group">
            <label width="80">場地類別：</label>
                    <label name="category">{{$category->name}}</label>
        </div>


            <div class="form-group">
                <label width="80">場地狀態：</label>
                @if($place->status=='正常使用中')
                    <label name="status">{{$place->status}}</label>
                    @else
                <label name="status"><font color="#FF0000"  size="+2">{{$place->status}}</font></label>
            @endif
            </div>

            <div class="form-group">
                <label width="80">負責人：</label>
                <label name="keeper">{{$user->name}}</label>
            </div>

            <div class="form-group">
                <label width="80">可否租借：</label>
                    <label name="lendable">
                        @if($place->lendable)
                        是
                        @else
                            <lable name="lendable">否</lable>
                        @endif
                    </label>
            </div>

            <div class="form-group">
                <label width="80">地點：</label>
                <label name="location">{{$place->location}}</label>
            </div>

            <div class="form-group">
                <label width="80">開放時段：</label>
				@foreach($times as $time)
				@foreach($weeks as $week)
										@if($time->id==$place->time_id)
											@if($week->id==$place->week_id)
										 <label name="warranty">{{$week->week}}&nbsp;&nbsp;&nbsp;&nbsp;{{ $time->time_end }}~{{ $time->time_start }}</label>
                                        									
                                         @endif
										 @endif
										 @endforeach
										 @endforeach
               
            </div>

            <div class="form-group">
                <label width="80">詳細資訊：</label>
                <lable name="warranty">{{$place->remark}}</lable>
            </div>
    </div>
    
    <div class="col-xs-12">
                    
                           


        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>

</div>
<!-- /.row -->
@endsection
