@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">會員註冊</div>
                <div class="panel-body">
	@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li class='list-group-item list-group-item-danger'>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">＊姓名</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                               
                            </div>
                        </div>
	
		


                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">＊信箱</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                               
                            </div>
                        </div>
						
						 <div class="form-group">
                            <label for="email" class="col-md-4 control-label">＊電話</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone')}}" >

                                
                                    <span class="help-block">
                                        <strong></strong>
                                    </span>
                               
                            </div>
                        </div>
							<div class="form-group">
               <label for="gender" class="col-md-4 control-label">＊性別</label>
			   <div class="col-md-6">
				<select name="gender" class="form-control">
				
                    <option value="男">男</option>
					 <option value="女">女</option>
                    
				</select>
               
            </div>
			</div>
						
						

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">＊密碼</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                               
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">＊確定密碼</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                
                            </div>
                        </div>
						
						 <div class="form-group">
                            <label for="address" class="col-md-4 control-label">住址</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
									<span class="help-block">
                                        <strong></strong>
                                    </span>								
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
							<P>＊號項目為必填欄位</P>
                                <button type="submit" class="btn btn-primary">
                                    註冊
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
