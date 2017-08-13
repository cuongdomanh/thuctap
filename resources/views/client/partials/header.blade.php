<header class="header
        header-topbar-view
        header-normal-width
        navbar-fixed-top
        header-color-black
        header-logo-black
        header-topbarbox-1-left
        header-topbarbox-2-right
        header-navibox-1-left
        header-navibox-2-right
        header-navibox-3-right
        header-navibox-4-right
       ">
    <div class="container container-boxed-width">
        {{--<div class="top-bar">--}}
        {{--<div class="container">--}}
        {{--<div class="header-topbarbox-1">--}}
        {{--<ul>--}}
        {{--<li>Email: noithat3dep@gmail.com </li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="header-topbarbox-2">--}}
        {{--@if(Auth::check())--}}
        {{--<img ickalt="" class="img-circle" src="{{Auth::user()->thumbnail}}" style="height: 30px"/>--}}
        {{--<span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>--}}
        {{--<a title="Thoát" href="{{url('logout')}}"><span--}}
        {{--class="username username-hide-on-mobile"> / Đăng xuất</span></a>--}}
        {{--@else--}}
        {{--<div><a title="Login" href="{{url('/auth/facebook')}}">--}}
        {{--<span class="glyphicon glyphicon-user" style="font-size: 15px;"> </span>--}}
        {{--Đăng Nhập--}}
        {{--</a>--}}
        {{--</div>--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <nav id="nav" class="navbar">
            <div class="container ">
                <div class="header-navibox-1" style="padding: 0px;">
                    <!-- Mobile Trigger Start -->
                    <button class="menu-mobile-button visible-xs-block  js-toggle-mobile-slidebar  toggle-menu-button ">
                        <div class="toggle-menu-button-icon"><span></span> <span></span> <span></span> <span></span>
                            <span></span> <span></span></div>
                    </button>
                    <!-- Mobile Trigger End-->
                    <a class="navbar-brand scroll" href="{{url('home')}}">
                        <img class="normal-logo " src="{{ url('images/logo-2.png') }}" alt="logo">
                        <img class="scroll-logo hidden-xs" src="{{ url('images/logo-2.png') }}" alt="logo"
                             style="height: 80px;">
                    </a>
                </div>
                <div class="header-navibox-4">
                    <div class="header-cart">
                        <a href="{{ url('cart') }}"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                        <span class="header-cart-count">{{ Cart::content()->count() }}</span>
                    </div>
                </div>
                <div class="header-navibox-3">
                    <ul class="nav navbar-nav hidden-xs clearfix vcenter">
                        <li class=""><a class="btn_header_search" href="#"><i class="fa fa-search"></i></a></li>
                        {{--<li>--}}
                            {{--<button class=" js-toggle-left-slidebar   toggle-menu-button ">--}}
                                {{--<div class="toggle-menu-button-icon"><span></span> <span></span> <span></span>--}}
                                    {{--<span></span> <span></span> <span></span></div>--}}
                            {{--</button>--}}
                        {{--</li>--}}
                        @if(Auth::check())
                            <li class="">
                                <img ickalt="" class="img-circle" src="{{Auth::user()->thumbnail}}"
                                     style="height: 30px"/>
                                <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                            </li>
                            <li class="">
                                <a title="Thoát" href="{{url('logout')}}">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                </a>
                            </li>
                        @else
                            <li class="">
                                <a title="Login" href="{{url('/auth/facebook')}}">
                                    <span class="glyphicon glyphicon-user" style="font-size: 15px;"></span>
                                    Đăng Nhập
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="header-navibox-2">
                    <ul class="yamm main-menu nav navbar-nav">
                        <li class="dropdown">
                            <a class="heading-line dropdown-toggle" href="{{url('home')}}">Trang chủ</a>
                        </li>
                        @foreach(Menu::getAll() as $item)
                            @if($item->type==0)
                                <li class="dropdown">
                                    <a class="heading-line" href="{{url('product')}}">{{$item->title}}</a>
                                    <ul class="dropdown-menu">
                                        @foreach($item->child as $childItem)
                                            <li>
                                                <a href="{{url('product/'.$childItem->id)}}">{{$childItem->title}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                            @if($item->type==1)
                                <li>
                                    <a class="heading-line" href="{{url('about')}}">{{$item->title}}</a>
                                </li>
                            @endif
                            @if($item->type==2)
                                <li>
                                    <a class="heading-line" href="{{url('news')}}">{{$item->title}}</a>
                                </li>
                            @endif
                            @if($item->type==3)
                                <li>
                                    <a class="heading-line" href="{{url('contact')}}">{{$item->title}}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>