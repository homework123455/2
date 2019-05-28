@extends('admin.layouts.master')

@section('title', '新增使用者')

@section('content')
<!-- Page Heading -->

@if(!(Auth::user()->previlege_id==3))
    <div class="col-sm-12">
        <h1 class="page-header">
            <small></small>
        </h1>
    </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增違規</h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
            <form action="/admin/users/{{$user->id}}/wrongdata" method="POST" role="form">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}


                <div  class="form-group">
                    <label>違規原因：</label>
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
                        <option value="逾時未取貨" >逾時未取貨</option>
                        <option value="惡意訂購" >惡意訂購</option>



                    </select>
                    <textarea name="wrongname1" class="form-control" placeholder="加入其他原因" rows="3" onblur="Change(this)"></textarea>


                </div>
            <div class="form-group">
                <label width="80">違規時間： 例如：2019-01-01</label>
                <input name="date" class="form-control" placeholder="請輸入違規時間">
            </div>
			


            <div class="text-right">
                <button type="submit" class="btn btn-success">新增</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
</div>
<!-- /.row -->
@endsection
