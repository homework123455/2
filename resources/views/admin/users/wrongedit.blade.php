@extends('admin.layouts.master')

@section('title', '修改違規')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改違規 <small>編輯違規資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->
@foreach($wrong as $wrongs)
<div class="row">
    <div class="col-lg-12">
	
        <form action="/admin/users/{{$user->id}}/wrongdata/{{$wrongs->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
@if($wrongs->id==$wid->id)
            <div class="form-group">
                <label>違規編號：</label>
                <input name="id" class="form-control"  value="{{$wrongs->id}}" readonly>
            </div>

            <div class="form-group">
                <label>違規內容：</label>
                <script language="javascript">

                        function Change(Obj){

                            var wrongname = document.getElementById("wrongname");

                            var Upd = true;

                            for(var i=0;i<wrongname.length;i++){

                                if(wrongname.options[i].value==Obj.value){

                                    Upd = false;

                                    break;

                                }

                            }

                            if(Upd){

                                wrongname.options[wrongname.length] = new Option(Obj.value,Obj.value);

                            }

                            Obj.value="";

                        }

                    </script>
                    <select id="wrongname" name="wrongname" class="form-control" >
					@if($wrongs->wrongname=="破壞場地")
                        <option value="破壞場地" selected="true">破壞場地</option>
					@else
						<option value="破壞場地" >破壞場地</option>
					@endif
					@if($wrongs->wrongname=="逾時未還")
                        <option value="逾時未還" selected="true">逾時未還</option>
					@else
						<option value="逾時未還" >逾時未還</option>
					@endif
					@if($wrongs->wrongname=="違反規定")
                        <option value="違反規定" selected="true">違反規定</option>
@else
	<option value="違反規定" >違反規定</option>
@endif
                    </select>
                    <textarea name="wrongname1" class="form-control" placeholder="加入其他原因" rows="3" onblur="Change(this)"></textarea>


                </div>

            <div class="form-group">
                <label>違規時間：</label>
				<input name="date" class="form-control" placeholder="請輸入違規時間" value="{{$wrongs->date}}">
               
            </div>

            

            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
               
            </div>
@endif
        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
@endforeach
<!-- /.row -->
@endsection
