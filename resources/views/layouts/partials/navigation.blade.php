
<header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand mb-1" href=""><img src="{{asset('img/core-img/images.jpg')}}" width="50px" height="50px" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                   <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{route('main.shop')}}">商城</a></li>
                            <li><a href="{{route('main.news')}}">公告</a></li>
                            <li><a href="{{route('main.contact')}}">關於我們</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="{{route('search')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="search" id="search" placeholder="搜尋商品";>
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="{{route('login')}}"><img src="{{asset('/img/core-img/user.svg')}}" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="{{route('cart')}}" id="essenceCartBtn"><img src="{{asset('/img/core-img/bag.svg')}}" alt=""> <span></span></a>
                </div>
                
            </div>	

        </div>
    </header>