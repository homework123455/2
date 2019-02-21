@extends('admin.layouts.master')

@section('title', '修改公告')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改公告 <small>編輯公告</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/news/{{$news->id}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
			{{ method_field('PATCH') }}
            <div class="form-group">
                <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <label>上傳商品圖片:</label>
                </fieldset>

                <input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
				
				
                </div>
            <div class="form-group">
                <label>標題：</label>
                <input name="title" class="form-control" placeholder="請輸入標題" value="{{$news->title}}">
            </div>

             <div class="form-group">
                <label>內容1：</label>
                <input name="content1" class="form-control" placeholder="輸入內容" value="{{$news->content1}}"> 
            </div>
			 <div class="form-group">
                <label>內容2：</label>
                <input name="content2" class="form-control" placeholder="輸入內容" value="{{$news->content2}}"> 
            </div>
			 <div class="form-group">
                <label>內容3：</label>
                <input name="content3" class="form-control" placeholder="輸入內容" value="{{$news->content3}}"> 
            </div>
			 <div class="form-group">
                <label>內容4：</label>
               <input name="content4" class="form-control" placeholder="輸入內容" value="{{$news->content4}}"> 
            </div>

            
            <div class="text-right">
                <button type="submit" class="btn btn-success">更新</button>
            </div>
        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
