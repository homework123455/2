<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="{{ route('admin.dashboard.index') }}">
        <img  src="https://download.taiwantradeshows.com.tw/files/exhibitor/TM2017/0906/1473149981399-1.jpg"  class="img-circle" href="{{ route('admin.dashboard.index') }}"  width="65" height="50">
        </a>
    </div>
    <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">勤益體育館場地租借系統</a>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>{{Auth::user()->name}} <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('admin.users.data', Auth::user()->id) }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li>
                <li>
                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-gear"></i>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            @if(Auth::user()->previlege_id==3)
                <li class="active">
                    <a href="{{ route('admin.dashboard.index') }}"><i class="fa fa-fw fa-dashboard"></i> 首頁</a>
                </li>
                <li>
                    <a href="{{ route('admin.places.index') }}"><i class="fa fa-fw fa-edit"></i> 場地管理</a>
                </li>
            <li>
                <a href="{{ route('admin.maintainces.index') }}"><i class="fa fa-fw fa-edit"></i> 報修處理</a>
            </li>
           
               <li>
                    <a href="{{ route('admin.news.index') }}"><i class="fa fa-fw fa-edit"></i> 公告管理</a>
               </li>
            <li>
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-fw fa-edit"></i> 使用者管理</a>
            </li>
            @endif
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>
