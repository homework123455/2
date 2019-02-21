@extends('admin.layouts.master')

@section('title', '場地申請')

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
            場地申請 <small>請選擇場地</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/places/{{$place->id}}/application/store" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div>
            <div class="form-group">
                <label>場地名稱：</label>
                <lable name="name">{{$place->name}}</lable>
            </div>

            <div class="form-group">
                <label>場地類別：</label>
                <lable name="category">{{$category->name}}</lable>
            </div>

            <div class="form-group">
                <label>場地狀態：</label>
                <lable name="status">{{$place->status}}</lable>
            </div>

            <div class="form-group">
                <label>保管人：</label>
                <lable name="keeper">{{$user->name}}</lable>
            </div>

            <div class="form-group">
                <label>地點：</label>
                <lable name="location">{{$place->location}}</lable>
            </div>
			<div class="form-group">
                <label>租用器材：</label>
                <select id="tool" name="tool" class="form-control" >
                    <option value="是" >是</option>
                    <option value="否" >否</option>
					
					
                </select>
            </div>
            </div>

            <div  class="form-group">
                <label>用途描述：</label>
                <script language="javascript">  

function Change(Obj){  

    var problem = document.getElementById("problem");  

    var Upd = true;  

    for(var i=0;i<problem.length;i++){  

        if(problem.options[i].value==Obj.value){  

            Upd = false;  

            break;  

        }  

    }  

    if(Upd){  

        problem.options[problem.length] = new Option(Obj.value,Obj.value);  

    }  

    Obj.value="";  

}  

</script>  
				<select id="problem" name="problem" class="form-control" >
                    <option value="個人" >個人</option>
                    <option value="社團" >社團</option>
					
					
                </select>
				<textarea name="problem1" class="form-control" placeholder="加入其他用途" rows="2" onblur="Change(this)"></textarea>

				
            </div>

            <div>
                <button type="submit" class="btn btn-success">申請</button>
                <a href="{{ route('admin.places.index') }}" class="btn btn-success">返回</a>
            </div>
        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
