@extends('admin.layouts.master')

@section('title', '維修明細')

@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            維修<small>維修明細修改</small>
        </h1>
    </div>
</div>
<!-- /.row -->
@include('admin.layouts.partials.validation')
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <form action="/admin/maintainces/{{$maintaince->id}}/details/{{$maintainceitem->id}}" method="POST" role="form">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="form-group">
                <label>維修項目：</label>
                <input name="name" class="form-control" placeholder="請輸入維修項目" value={{$maintainceitem->name}}>
            </div>

            <div class="form-group">
                <label>金額：</label>
                <input name="amount" class="form-control" placeholder="請輸入金額" value={{$maintainceitem->amount}}>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-success">修改</button>
            </div>
        </form>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>

    </div>
</div>
<!-- /.row -->
@endsection
