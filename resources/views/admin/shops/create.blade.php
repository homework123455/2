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
<!--
<Script language="Css">
.img {
    max-width: 150px; 
    max-height: 150px;
    margin: 5px;
}
</Script>
<Script language="javascript">
$(".form1").vmodel("--preview", true, function (){
 
        var vs = this;
 
        // 自動讀取的方法
        this.autoload = ['change_file'];
 
        // 連續的圖片編碼
        this.imgcode = '';
 
        // 選取發生改變
        this.change_file = function (){
            vs.root.on("change", ".upl", function (){
                local_show(this);
            });
        }
 
        // 批次圖片，先清空後再插入
        var local_show = function (input){
            if (input.files && input.files[0]) {
                local_clean();
                local_each_img(input.files);
            }
        }
 
        // 批次讀取，最後再一次寫入
        var local_each_img = function (files){
 
            $.each(files, function (index, file){
                console.log(file); //檔案資訊可以在這裡看到
                var src = URL.createObjectURL(file);
                local_create_imgcode(src);
            });
 
            // 放置預覽元素後重設
            vs.root.find(".preview").html(vs.imgcode);
            local_reset();
        }
 
        // 建立圖片
        var local_create_imgcode = function(src){
            vs.imgcode += '<img class="img" src="' + src + '">';
        }
 
        // 清空預覽區域
        var local_clean = function (){
            vs.root.find(".preview").empty();
        }
 
        // 還原 input[type=file]
        var local_reset = function (){
            vs.imgcode = '';
            vs.root.find(".upl").val(null);
        }
 
    });
 </Script>
 -->
<div class="row">
    <div class="col-lg-12">
        <form class"form1" action="/admin/places" method="POST"  role="form"   enctype="multipart/form-data">
            {{ csrf_field() }}
       
                 <div class="form-group">
                <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <label>上傳商品圖片:</label>
                </fieldset>

                <input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">	
					<!--<div class="preview">
				</div>			-->	
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
