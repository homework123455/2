@extends('admin.layouts.master')

@section('title', '新增場地')

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
            新增商品 <small>請輸入商品資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/places" method="POST"  role="form"   enctype="multipart/form-data">
            {{ csrf_field() }}
       
                 <div class="form-group">
                <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <label>上傳商品圖片:</label>
                </fieldset>

                <input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">		
				<input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
				<input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">	
				<input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
				
                </div>

            				
				<div class="form-group">
                <label>商品名稱：</label>
				<input name="name" class="form-control" placeholder="請輸入商品名稱">
               
            </div>

            <div class="form-group">
                <label>商品分類：</label>
 
                <select id="category" name="category" class="form-control">
                    @foreach($categories as $category)
                    <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
				

            </div>

            

            <div class="form-group">
                <label>商品狀態：</label>
                 <select name="status" class="form-control">
				    <option value="補貨中">補貨中</option>
                    <option value="上架中">上架中</option>
                    <option value="下架中">下架中</option>
                    
                    
                </select>
            </div>

            			
			 <div class="form-group">
                <label>可否折扣？</label>
                <select name="lendable" class="form-control">
                    <option value="0">否</option>
                    <option value="1">可</option>
                </select>
            </div>
			<div class="form-group">
                <label>庫存數量：</label>
                <input name="stock" class="form-control" placeholder="請輸入庫存數量">
            </div>


            <div class="form-group">
                <label>商品價格：</label>
                <input name="price" class="form-control" placeholder="請輸入商品價格">
            </div>


            <div class="form-group">
                <label>詳細資訊：</label>
                <textarea name="details" class="form-control" rows="2"></textarea>
				<label>產品資訊：</label>
                <textarea name="details2" class="form-control" rows="2"></textarea>
				<label>介紹：</label>
                <textarea name="details3" class="form-control" rows="2"></textarea>
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
