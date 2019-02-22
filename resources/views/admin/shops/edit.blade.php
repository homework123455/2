@extends('admin.layouts.master')

@section('title', '修改商品')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            修改商品 <small>編輯商品資料</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">

        <form action="/admin/shops/{{$good->id}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
			{{ method_field('PATCH') }}

            
            <div class="form-group">
			 <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                    <label>上傳商品圖片:</label>
                </fieldset>

                <input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
				<input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
				<input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
				<input type="file" name="img[]"  accept="image/jpeg,image/jpg,image/gif,image/png" style="display: block;margin-bottom: 5px;">
                <label>商品名稱：</label>

                <input name="name" class="form-control" placeholder="請輸入商品名稱" value="{{$good->name}}">
				
            </div>

            <div class="form-group">
                <label>商品類別：</label>
                <select name="category" class="form-control">
                    @foreach($categories as $category)

                        @if($good->category==$category->id)
                            <option value={{ $category->id }} selected="true">{{ $category->name }}</option>
                        @else
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

           

            <div class="form-group">
                <label>商品狀態：</label>

                <label>{{$good->status}}</label>
            </div>

           

            <div class="form-group">
                <label>可否租借：</label>

                @if($good->status=='租借中')
                    @if($good->lendable=="0")
                        <label>否</label>
                        @else
                        <label>是</label>
                    @endif
                    @else
                <select name="lendable" class="form-control">

                    <option value="0" {{ $good->lendable?'':'SELECTED' }}>否</option>
                    <option value="1" {{ $good->lendable?'SELECTED':'' }}>是</option>
                </select>
                    @endif
            </div>

            <div class="form-group">
                <label>售價：</label>

                <input name="price" class="form-control" placeholder="請輸入商品售價" value="{{$good->price}}">
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
                <button type="submit" class="btn btn-success">更新</button>
                <a class="btn btn-success" href="{{ route('admin.places.index') }}"  role="button">返回</a>
            </div>

        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
