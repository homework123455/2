@extends('admin.layouts.master')

@section('title', '新增公告')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            新增公告
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/news" method="POST" role="form"enctype="multipart/form-data">
            {{ csrf_field() }}
	<div class="form-group">
                <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <label>上傳公告圖片:</label>
                </fieldset>

                <input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
				
				
                </div>
            <div class="form-group">
                <label>標題：</label>
                <input name="title" class="form-control" placeholder="輸入標題">
            </div>
			

            <div class="form-group">
                <label>內容1：</label>
                <textarea name="content1" class="form-control" placeholder="輸入內容"> </textarea>
            </div>
			 <div class="form-group">
                <label>內容2：</label>
                <textarea name="content2" class="form-control" placeholder="輸入內容"> </textarea>
            </div>
			 <div class="form-group">
                <label>內容3：</label>
                <textarea name="content3" class="form-control" placeholder="輸入內容"> </textarea>
            </div>
			 <div class="form-group">
                <label>內容4：</label>
                <textarea name="content4" class="form-control" placeholder="輸入內容"> </textarea>
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
