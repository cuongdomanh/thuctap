<!-- ========================== -->
<!-- MOBILE MENU  -->
<!-- ========================== -->
<div off-canvas="mobile-slidebar left overlay">
    <ul class="nav navbar-nav ">
        <li>
            <a href="{{url('home')}}" class="navbar-brand scroll">
                <img alt="logo" src="{{ asset('images/logo-2.png') }}" class="normal-logo ">
                <img alt="logo" src="{{ asset('images/logo-2.png') }}" class="scroll-logo hidden-xs">
            </a>
        </li>
        <li class="dropdown">
            <a class="heading-line dropdown-toggle" href="{{url('home')}}">Trang chủ</a>
        </li>
        @foreach(Menu::getAll() as $item)
            @if($item->type==0)
                <li class="dropdown">
                    <a class="heading-line" data-toggle="dropdown" href="{{url('product')}}">{{$item->title}}</a>
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

<!-- ========================== -->
<!-- SLIDE MENU  -->
<!-- ========================== -->

<div off-canvas="slidebar-1 left overlay">
    <ul class="nav navbar-nav ">
        <li class="dropdown">
            <a class="heading-line dropdown-toggle" data-toggle="dropdown" href="{{url('home')}}">Trang chủ</a>
            <ul class="dropdown-menu">
                <li>
                    <a href="home-1.html">Home-1</a>
                </li>
                <li>
                    <a href="home-2.html">Home-2</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="heading-line" href="category-1.html">shop</a>
        </li>
        <li>
            <a class="heading-line" href="category-2.html">sale items</a>
        </li>
        <li>
            <a class="heading-line" href="typography.html">about</a>
        </li>
        <li class="dropdown">
            <a class="heading-line" data-toggle="dropdown" href="blog-main.html">blog</a>
            <ul class="dropdown-menu">
                <li>
                    <a href="blog-main.html">Blog Main</a>
                </li>
                <li>
                    <a href="blog-post.html">Blog Post</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="heading-line" href="contact.html">Contact</a>
        </li>
    </ul>
</div>
<div off-canvas="slidebar-2 right reveal">
    <ul class="nav navbar-nav ">
        <li class="dropdown">
            <a class="heading-line dropdown-toggle" href="{{url('home')}}">Trang chủ</a>
        </li>
        @foreach(Menu::getAll() as $item)
            @if($item->type==0)
                <li class="dropdown">
                    <a class="heading-line" data-toggle="dropdown" href="{{url('product')}}">{{$item->title}}</a>
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
<div off-canvas="slidebar-3 top push">
    <ul class="nav navbar-nav ">
        <li class="dropdown">
            <a class="heading-line dropdown-toggle" data-toggle="dropdown" href="home-1.html">HOME</a>
            <ul class="dropdown-menu">
                <li>
                    <a href="home-1.html">Home-1</a>
                </li>
                <li>
                    <a href="home-2.html">Home-2</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="heading-line" href="category-1.html">shop</a>
        </li>
        <li>
            <a class="heading-line" href="category-2.html">sale items</a>
        </li>
        <li>
            <a class="heading-line" href="typography.html">about</a>
        </li>
        <li class="dropdown">
            <a class="heading-line" data-toggle="dropdown" href="blog-main.html">blog</a>
            <ul class="dropdown-menu">
                <li>
                    <a href="blog-main.html">Blog Main</a>
                </li>
                <li>
                    <a href="blog-post.html">Blog Post</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="heading-line" href="contact.html">Contact</a>
        </li>
    </ul>
</div>
<div off-canvas="slidebar-4 bottom push">
    <ul class="nav navbar-nav ">
        <li class="dropdown">
            <a class="heading-line dropdown-toggle" data-toggle="dropdown" href="home-1.html">HOME</a>
            <ul class="dropdown-menu">
                <li>
                    <a href="home-1.html"></a>
                </li>
                <li>
                    <a href="home-2.html">Home-2</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="heading-line" href="category-1.html">shop</a>
        </li>
        <li>
            <a class="heading-line" href="category-2.html">sale items</a>
        </li>
        <li>
            <a class="heading-line" href="typography.html">about</a>
        </li>
        <li class="dropdown">
            <a class="heading-line" data-toggle="dropdown" href="blog-main.html">blog</a>
            <ul class="dropdown-menu">
                <li>
                    <a href="blog-main.html">Blog Main</a>
                </li>
                <li>
                    <a href="blog-post.html">Blog Post</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="heading-line" href="contact.html">Contact</a>
        </li>
    </ul>
</div>
