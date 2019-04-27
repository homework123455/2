@extends('admin.layouts.master')

@section('title', '系統設定')

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
            系統設定 <small>設定</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<ul id="myTab" class="nav nav-tabs">
    <li class="active"><a href="#home" data-toggle="tab">
            筆數設定</a>
    </li>
    <li><a href="#ios" data-toggle="tab">運費設定</a></li>

	<li><a href="#run" data-toggle="tab">跑馬燈設定</a></li>

	<li><a href="#ios1" data-toggle="tab">VIP設定</a></li>

    
</ul>
<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade in active" id="home">
<div class="row">
    <div class="col-lg-12">
        <form class"form1" action="/admin/setting" method="POST"  role="form"   enctype="multipart/form-data">
            {{ csrf_field() }}
       
				<div class="form-group">
                <label>商品筆數：</label>
				<input name="goods" class="form-control" placeholder="請輸入商品筆數" value={{$good}}>
               
            </div>

            <div class="form-group">
                <label>訂單筆數：</label>
 <input name="orders" class="form-control" placeholder="請輸入訂單筆數" value={{$order}}>
 
				</div>
</div>
            </div>
			</div>
			
		 <div class="tab-pane fade" id="ios">
          <div class="form-group">
                <label>運費設定：</label>
				<input name="price" class="form-control" placeholder="請輸入運費" value={{$price}}>
               
            </div>
			<div class="form-group">
                <label>免運費設定：</label>
				<input name="low_price" class="form-control" placeholder="請輸入運費" value={{$low_price}}>
               
            </div>
			 </div>

			  <div class="tab-pane fade" id="run">
          <div class="form-group">
                <label>跑馬燈設定：</label>
				<input type="file" name="img1"  onchange="openFile(event)" accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">	
				<img id="output" height="200" style="display:none">
				<img id="output3"src={{$run1}} height="200"> 
				<input type="file" name="img2"  onchange="openFile1(event)" accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">	
				<img id="output4" src={{$run2}} height="200" >
				<img id="output1" height="200"style="display:none"> 
				<input type="file" name="img3"  onchange="openFile2(event)" accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">	
				<img id="output5" src={{$run3}} height="200">
				<img id="output2" height="200" style="display:none">
               
            </div>
			
			 </div>

			 <div class="tab-pane fade" id="ios1">
          <div class="form-group">
                <label>VIP金額設定：</label>
				<input name="vip" class="form-control" placeholder="請輸入VIP金額" value={{$vip}}>
               
            </div>
			<label>VIP折扣設定：EX：9.5</label>
				<input name="vip_discount" class="form-control" placeholder="請輸入折扣數量" value={{$vip_discount}}>
               
            </div>
			</div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">確定</button>
            </div>

            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

        </form>
    </div>
<Script language="javascript">
function openFile(event){
  var input = event.target; //取得上傳檔案
  var reader = new FileReader(); //建立FileReader物件

  reader.readAsDataURL(input.files[0]); //以.readAsDataURL將上傳檔案轉換為base64字串

  reader.onload = function(){ //FileReader取得上傳檔案後執行以下內容
    var dataURL = reader.result; //設定變數dataURL為上傳圖檔的base64字串
    $('#output').attr('src', dataURL).show(); //將img的src設定為dataURL並顯示
	var imgId=document.getElementById("output3");
	imgId.style.display="none";
  };
}

function openFile1(event){
  var input = event.target; //取得上傳檔案
  var reader = new FileReader(); //建立FileReader物件

  reader.readAsDataURL(input.files[0]); //以.readAsDataURL將上傳檔案轉換為base64字串

  reader.onload = function(){ //FileReader取得上傳檔案後執行以下內容
    var dataURL = reader.result; //設定變數dataURL為上傳圖檔的base64字串
    $('#output1').attr('src', dataURL).show(); //將img的src設定為dataURL並顯示
	var imgId=document.getElementById("output4");
	imgId.style.display="none";
  };
}

function openFile2(event){
  var input = event.target; //取得上傳檔案
  var reader = new FileReader(); //建立FileReader物件

  reader.readAsDataURL(input.files[0]); //以.readAsDataURL將上傳檔案轉換為base64字串

  reader.onload = function(){ //FileReader取得上傳檔案後執行以下內容
    var dataURL = reader.result; //設定變數dataURL為上傳圖檔的base64字串
    $('#output2').attr('src', dataURL).show(); //將img的src設定為dataURL並顯示
	var imgId=document.getElementById("output5");
	imgId.style.display="none";
  };
}


 </Script>
<!-- /.row -->
@endsection
