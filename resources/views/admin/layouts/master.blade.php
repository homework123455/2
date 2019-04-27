<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
<script src="jqajax_select.js"></script>
    <title>@yield('title') | 管理後台</title>

    <!-- Bootstrap Core CSS -->
	
    <link href="{{ asset('css/bootstrap1.min.css') }}" rel="stylesheet">

	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    @if(Auth::user()->previlege_id==3)
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
    @endif
    <!-- Morris Charts CSS -->
    <link href="{{ asset('css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/style2.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/bootstrap2.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        @include('admin.layouts.partials.sidebar')
        <div id="page-wrapper">

            <div class="container-fluid">

                @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('js/plugins/morris/morris-data.js') }}"></script>
	 <script src="{{ asset('js/jquery2.min.js') }}"></script>
	 <script src="{{ asset('js/lib.js') }}"></script>
	


</body>

</html>
