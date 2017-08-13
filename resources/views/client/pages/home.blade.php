@extends('client.layouts.index')
@section('content')
    @include('client.partials.slider')
    @include('client.partials.alert')
    {{--<div class="b-main-categories">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xs-12 col-sm-6 wow fadeInLeft">--}}
    {{--<div class="b-main-cat cat1 text-left">--}}
    {{--<div class="b-image">--}}
    {{--<div class="grid">--}}
    {{--<figure class="effect-layla">--}}
    {{--<img src="media/home/home-2.jpg" alt="/">--}}
    {{--<figcaption>--}}
    {{--<a href="category-1.html">View more</a>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="categories-title">--}}
    {{--<div>--}}
    {{--<h5 class="heading-light-merri">Add Some</h5>--}}
    {{--<h4>Modern Accent</h4>--}}
    {{--</div>--}}
    {{--<div>--}}
    {{--<p>Best Modern Furniture For Your Home!</p>--}}
    {{--<a class="solo-arrow" href="category-1.html"><span class="ef arrow_right"></span></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-xs-12 col-sm-6 wow fadeInRight">--}}
    {{--<div class="b-main-cat cat2 text-right">--}}
    {{--<div class="b-image">--}}
    {{--<div class="grid">--}}
    {{--<figure class="effect-layla">--}}
    {{--<img src="media/home/home-3.jpg" alt="/">--}}
    {{--<figcaption>--}}
    {{--<a href="category-1.html">View more</a>--}}
    {{--</figcaption>--}}
    {{--</figure>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="categories-title">--}}
    {{--<div>--}}
    {{--<h5 class="heading-light-merri">Beautify</h5>--}}
    {{--<h4>Your Room</h4>--}}
    {{--</div>--}}
    {{--<div>--}}
    {{--<p>All-Rounder Accessories Collection</p>--}}
    {{--<a class="solo-arrow solo-arrow-left" href="category-2.html"><span--}}
    {{--class="ef arrow_left"></span></a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="b-home-items">
        <div class="heading-big text-center wow fadeInUp">
            <div class="heading-icon">
                <span class="ef icon_gift_alt"></span>
            </div>
            <h2>
                <strong>Sản phẩm mới</strong>
                <span>Tấm ốp vấn đá PVC</span>
            </h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="b-items-sort items-series text-uppercase clearfix">
                        <ul class="list-inline pull-left items-series b-items-sort">
                            @foreach($category as $item)
                                <li data-filter=".{{$item->slug}}">
                                    {{$item->title}}
                                </li>
                            @endforeach
                            {{--<li data-filter=".sofas">--}}
                            {{--sofas--}}
                            {{--</li>--}}
                            {{--<li data-filter=".beds">--}}
                            {{--beds--}}
                            {{--</li>--}}
                            {{--<li data-filter=".accessories">--}}
                            {{--accessories--}}
                            {{--</li>--}}
                            {{--<li data-filter=".lamps">--}}
                            {{--lamps--}}
                            {{--</li>--}}
                            {{--<li data-filter=".decor">--}}
                            {{--decor--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
                <div class="hidden-xs col-sm-4 col-md-3 col-lg-3 wow fadeInLeft">
                    <div class="b-home-deal">
                        <div class="home-deal-content">
                            <div class="heading-line-mod heading-light-merri">
                                <h2>{{$show1->title}}</h2>
                            </div>
                            <h4 class="text-uppercase">
                                {!! $show1->description!!}
                            </h4>
                            <a href="{{$show1->link}}" class="btn btn-primary-arrow btn-sm-arrow">
                                Xem chi tiết
                                <span class="ef arrow_right"></span>
                            </a>
                        </div>
                        <img src="{{$show1->image}}" class="img-responsive center-block" alt="/"
                             style="max-width: 263px;max-height: 630px">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9 wow fadeInUp">
                    <div class="row">
                        <div class="scroll" style="height: 550px;overflow-y: scroll ;">
                            <div class="b-home-series">
                                @foreach($productNew as $it)
                                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 home-item {{$it->category->slug}}">
                                        <div class="b-item-card-mod">
                                            <div class="product-image">
                                                <a href="{{url('product/'.$it->id.'/'.$it->slug)}}">
                                                    <img src="{{$it->thumbnail}}"
                                                         class="img-responsive center-block" alt="/"
                                                         style="height: 210px;width: 180px">
                                                </a>
                                                <div class="b-card-buttons">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <a href="{{url('addcart/'. $it->id )}}">
                                                                <span class="ef icon_cart_alt"></span>
                                                            </a>
                                                        </li>
                                                        {{--<li>--}}
                                                        {{--<a href="home-1.html#">--}}
                                                        {{--<span class="ef icon_heart_alt "></span>--}}
                                                        {{--</a>--}}
                                                        {{--</li>--}}
                                                        {{--<li>--}}
                                                        {{--<a href="home-1.html#">--}}
                                                        {{--<span class="ef icon_folder-add_alt"></span>--}}
                                                        {{--</a>--}}
                                                        {{--</li>--}}
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="caption">
                                                <p class="product-name">
                                                    {{$it->title}}
                                                </p>
                                                <p class="product-price">
                                                    <span>Giá:</span>
                                                    @if($it->price == 0)
                                                        <span>Liên hệ</span>
                                                    @else
                                                        <span>{{number_format($it->price)}} VND</span>
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="b-main-categories">
        <div class="container">
            <div class="row">
                @foreach($newsRandom as $key=>$item)
                    @if($key==0)
                        <div class="col-xs-12 col-sm-6 wow fadeInLeft">
                            <div class="b-main-cat cat1 text-left">
                                <div class="b-image">
                                    <div class="grid">
                                        <figure class="effect-layla">
                                            <img src="{{ url('uploads/news/'. $item->thumbnail) }}" alt="/">
                                            <figcaption>
                                                <a href="{{url('news/'.$item->id.'/'.$item->slug)}}">View more</a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="categories-title">
                                    <div>
                                        <h5 class="heading-light-merri">Bài viết</h5>
                                        <h4>Nổi bật</h4>
                                    </div>
                                    <div>
                                        <p>{{$item->title}}</p>
                                        <a class="solo-arrow" href="{{url('news/'.$item->id.'/'.$item->slug)}}"><span
                                                    class="ef arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-xs-12 col-sm-6 wow fadeInRight">
                            <div class="b-main-cat cat2 text-right">
                                <div class="b-image">
                                    <div class="grid">
                                        <figure class="effect-layla">
                                            <img src="{{ url('uploads/news/'. $item->thumbnail) }}" alt="/">
                                            <figcaption>
                                                <a href="{{url('news/'.$item->id.'/'.$item->slug)}}">View more</a>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                                <div class="categories-title">
                                    <div>
                                        <h5 class="heading-light-merri">Bài viết</h5>
                                        <h4>Phong cách</h4>
                                    </div>
                                    <div>
                                        <p>{{$item->title}}</p>
                                        <a class="solo-arrow solo-arrow-left"
                                           href="{{url('news/'.$item->id.'/'.$item->slug)}}"><span
                                                    class="ef arrow_left"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="b-home-bestsellers">
        <div class="heading-big text-center wow fadeInUp">
            <div class="heading-icon">
                <span class="ef icon_gift_alt"></span>
            </div>
            <h2>
                <strong>Phong cách</strong>
                <span>Trang trí họa tiết hoa văn sản phẩm</span>
            </h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="b-items-sort items-best text-uppercase clearfix text-center">
                        <ul class="list-inline items-best b-items-sort">
                            @foreach($style as $item)
                                <li data-filter=".{{$item->slug}}">
                                    {{$item->name}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                    <div class="row">
                        <div class="scroll" style="height: 550px;overflow-y: scroll ;">
                            <div class="b-home-best wow fadeInUp">
                                @foreach($product as $item)
                                    @if(isset($item['style'][0]))
                                        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 home-item-mod
                                        <?php
                                        foreach ($item->style as $styleItem) {
                                            echo $styleItem->slug . " ";
                                        }
                                        ?>
                                                ">
                                            <div class="b-item-card-mod">
                                                <div class="product-image">
                                                    <a href="{{url('product/'.$it->id.'/'.$it->slug)}}">
                                                        <img src="{{$item->thumbnail}}"
                                                             class="img-responsive center-block" alt="/"
                                                             style="width: 200px;height: 150px">
                                                    </a>
                                                    <div class="b-card-buttons">
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a href="{{url('addcart/'. $item->id)}}">
                                                                    <span class="ef icon_cart_alt"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="caption">
                                                    <p class="product-name">
                                                        {{$item->title}}
                                                    </p>
                                                    <p class="product-price">
                                                        <span>Giá:</span>
                                                        @if($item->price == 0)
                                                            <span>Liên hệ</span>
                                                        @else
                                                            <span>{{number_format($item->price)}} VND</span>
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--<div class="b-best-more">--}}
                    {{--<div class="row">--}}
                    {{--<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 home-item-mod furniture bathroom decorr">--}}
                    {{--<div class="b-item-card-mod">--}}
                    {{--<div class="product-image">--}}
                    {{--<a href="product-detail.html">--}}
                    {{--<img src="media/item-card-media/best1.jpg"--}}
                    {{--class="img-responsive center-block" alt="/">--}}
                    {{--</a>--}}
                    {{--<div class="b-card-buttons">--}}
                    {{--<ul class="list-unstyled">--}}
                    {{--<li>--}}
                    {{--<a href="shopping-cart.html">--}}
                    {{--<span class="ef icon_cart_alt"></span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="home-1.html#">--}}
                    {{--<span class="ef icon_heart_alt "></span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                    {{--<a href="home-1.html#">--}}
                    {{--<span class="ef icon_folder-add_alt"></span>--}}
                    {{--</a>--}}
                    {{--</li>--}}
                    {{--</ul>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="caption">--}}
                    {{--<p class="product-name">--}}
                    {{--relaxing sofa--}}
                    {{--</p>--}}
                    {{--<p class="product-price">--}}
                    {{--$349.00--}}
                    {{--</p>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <div class="hidden-xs col-sm-4 col-md-3 col-lg-3 wow fadeInRight">
                    <div class="b-home-deal deal2">
                        <div class="home-deal-content">
                            <div class="heading-line-mod heading-light-merri">
                                <h2>{{$show2->title}}</h2>
                            </div>
                            <h4 class="text-uppercase">
                                {!! $show2->description!!}
                            </h4>
                            <a href="{{$show2->link}}" class="btn btn-primary-arrow btn-sm-arrow">
                                Xem chi tiết
                                <span class="ef arrow_right"></span>
                            </a>
                        </div>
                        <img src="{{$show2->image}}" class="img-responsive center-block" alt="/"
                             style="max-width: 262px;max-height: 526px">
                    </div>
                </div>
                {{--<div class="col-xs-12 col-sm-12">--}}
                {{--<div class="text-center">--}}
                {{--<button class="btn btn-default-arrow btn-sm btn-more marg-t-25" id="loadMore" type="button">--}}
                {{--Xem thêm--}}
                {{--<span class="ef arrow_right"></span>--}}
                {{--</button>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
    {{--<div class="b-ezy">--}}
    {{--<div class="heading-big text-center wow fadeInUp">--}}
    {{--<div class="heading-icon">--}}
    {{--<span class="ef icon_gift_alt"></span>--}}
    {{--</div>--}}
    {{--<h2>--}}
    {{--<strong>ezy shopping</strong>--}}
    {{--<span>clabore dolore magna enim veniam exercitation</span>--}}
    {{--</h2>--}}
    {{--</div>--}}
    {{--<div class="container-fluid">--}}
    {{--<div class="b-ez-holder text-center clearfix">--}}
    {{--<div class="ez-item wow fadeInLeft">--}}
    {{--<div class="b-item-card clearfix">--}}
    {{--<div class="product-image">--}}
    {{--<ul class="ez-imgs list-unstyled enable-bx-slider" data-pager-custom="null"--}}
    {{--data-controls="false" data-min-slides="1" data-max-slides="1" data-slide-width="245"--}}
    {{--data-slide-margin="0" data-pager="true" data-mode="horizontal"--}}
    {{--data-infinite-loop="false">--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez1.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez3.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez2.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="caption">--}}
    {{--<div class="special-plank sale">--}}
    {{--<i class="fa fa-caret-right" aria-hidden="true"></i>--}}
    {{--<span class="text-uppercase">super sale</span>--}}
    {{--<i class="fa fa-caret-left" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<p class="product-class">--}}
    {{--Relaxer--}}
    {{--</p>--}}
    {{--<p class="product-name">--}}
    {{--Lounge Chair--}}
    {{--</p>--}}
    {{--<p class="product-price">--}}
    {{--$299.00--}}
    {{--</p>--}}
    {{--<a href="product-detail.html" class="solo-arrow text-uppercase"><span--}}
    {{--class="ef arrow_right"></span>shop now</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="ez-item wow fadeInUp">--}}
    {{--<div class="b-item-card clearfix">--}}
    {{--<div class="product-image">--}}
    {{--<ul class="ez-imgs list-unstyled enable-bx-slider" data-pager-custom="null"--}}
    {{--data-controls="false" data-min-slides="1" data-max-slides="1" data-slide-width="245"--}}
    {{--data-slide-margin="0" data-pager="true" data-mode="horizontal"--}}
    {{--data-infinite-loop="false">--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez2.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez1.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez2.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="caption">--}}
    {{--<div class="special-plank new">--}}
    {{--<i class="fa fa-caret-right" aria-hidden="true"></i>--}}
    {{--<span class="text-uppercase">new arrivals</span>--}}
    {{--<i class="fa fa-caret-left" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<p class="product-class">--}}
    {{--Stilt--}}
    {{--</p>--}}
    {{--<p class="product-name">--}}
    {{--Table Lamp--}}
    {{--</p>--}}
    {{--<p class="product-price">--}}
    {{--$299.00--}}
    {{--</p>--}}
    {{--<a href="product-detail.html" class="solo-arrow text-uppercase"><span--}}
    {{--class="ef arrow_right"></span>shop now</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="ez-item wow fadeInRight">--}}
    {{--<div class="b-item-card clearfix">--}}
    {{--<div class="product-image">--}}
    {{--<ul class="ez-imgs list-unstyled enable-bx-slider" data-pager-custom="null"--}}
    {{--data-controls="false" data-min-slides="1" data-max-slides="1" data-slide-width="245"--}}
    {{--data-slide-margin="0" data-pager="true" data-mode="horizontal"--}}
    {{--data-infinite-loop="false">--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez3.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez1.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--<li>--}}
    {{--<img src="media/item-card-media/ez2.jpg" class="img-responsive center-block"--}}
    {{--alt="/">--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="caption">--}}
    {{--<div class="special-plank limited">--}}
    {{--<i class="fa fa-caret-right" aria-hidden="true"></i>--}}
    {{--<span class="text-uppercase">limited stock items</span>--}}
    {{--<i class="fa fa-caret-left" aria-hidden="true"></i>--}}
    {{--</div>--}}
    {{--<p class="product-class">--}}
    {{--Unique--}}
    {{--</p>--}}
    {{--<p class="product-name">--}}
    {{--Magazine Table--}}
    {{--</p>--}}
    {{--<p class="product-price">--}}
    {{--$299.00--}}
    {{--</p>--}}
    {{--<a href="product-detail.html" class="solo-arrow text-uppercase"><span--}}
    {{--class="ef arrow_right"></span>shop now</a>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    <div class="b-brands">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <ul class="list-inline brands-list text-center wow fadeInUp">
                        <li>
                            <img src="media/brands-logos/brand1.png" class="img-responsive center-block" alt="/">
                        </li>
                        <li>
                            <img src="media/brands-logos/brand2.png" class="img-responsive center-block" alt="/">
                        </li>
                        <li>
                            <img src="media/brands-logos/brand3.png" class="img-responsive center-block" alt="/">
                        </li>
                        <li>
                            <img src="media/brands-logos/brand4.png" class="img-responsive center-block" alt="/">
                        </li>
                        <li>
                            <img src="media/brands-logos/brand5.png" class="img-responsive center-block" alt="/">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="b-parallax">
        <div class="b-reviews">
            <div class="heading text-center wow fadeInDown">
                <h2>Đánh giá khách hàng
                    <hàng></hàng>
                </h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-9 col-sm-offset-1">
                        <div class="b-reviews-holder enable-owl-carousel" data-loop="true" data-auto-width="false"
                             data-dots="false" data-nav="false" data-margin="0" data-responsive-class="true"
                             data-responsive='{"0":{"items": "1"}}' data-slider-next=".review-next"
                             data-slider-prev=".review-prev">
                            <div class="review-item clearfix">
                                <div class="review-userpic">
                                    <img src="media/home/reviews/review1.png" class="center-block img-circle"
                                         alt="/" style="max-width: 90px;max-height: 90px">
                                </div>
                                <div class="review-content">
                                    <p class="text-uppercase review-name">
                                        Nổ Văn Quảng Giám đốc BKAV
                                    </p>
                                    <p class="review-text">
                                        "Thật không thể tin nổi! Trang web nhỏ, nhưng là một bước tiến lớn về công
                                        nghệ."
                                    </p>
                                </div>
                            </div>
                            <div class="review-item clearfix">
                                <div class="review-userpic">
                                    <img src="media/home/reviews/review2.jpg" class="center-block img-circle"
                                         alt="/" style="max-width: 90px;max-height: 90px">
                                </div>
                                <div class="review-content">
                                    <p class="text-uppercase review-name">
                                        Biu Gết Sáng lập Microsoft
                                    </p>
                                    <p class="review-text">
                                        "Có nằm mơ tôi cũng không ngờ công nghệ của Laravel lại được áp dụng một cách
                                        sáng tạo như thế"
                                    </p>
                                </div>
                            </div>
                            <div class="review-item clearfix">
                                <div class="review-userpic">
                                    <img src="media/home/reviews/review3.jpg" class="center-block img-circle"
                                         alt="/" style="max-width: 90px;max-height: 90px">
                                </div>
                                <div class="review-content">
                                    <p class="text-uppercase review-name">
                                        Shigeo Tokuda Cụ già thần thánh
                                    </p>
                                    <p class="review-text">
                                        "Web rất hữu ích, giúp ông trang trí cho căn nhà của mình"
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-1 text-right">
                        <div class="slider-nav">
                            <a class="slider-prev review-prev"><span class="ef arrow_left"></span></a>
                            <a class="slider-next review-next"><span class="ef arrow_right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="b-latest-news">
        <div class="heading-big text-center wow fadeInUp">
            <div class="heading-icon">
                <span class="ef icon_gift_alt"></span>
            </div>
            <h2>
                <strong>Bài viết mới</strong>
                <span>Những bài viết được cập nhập sớm nhất</span>
            </h2>
        </div>
        <div class="b-latest-news-holder">
            <div class="container">
                <div class="row">
                    @foreach($news as $item)
                        <div class="col-xs-12 col-sm-4 wow fadeInLeft">
                            <div class="latest-news-item">
                                <div class="b-post-preview">
                                    <div class="post-image">
                                        <div class="post-img-holder">
                                            <img src="{{ url('uploads/news/'. $item->thumbnail) }}"
                                                 class="img-responsive center-block"
                                                 style="width: 360px;height: 350px" alt="/">
                                        </div>
                                    </div>
                                    <div class="post-caption">
                                        <div class="post-author">
                                            <ul class="list-inline">
                                                <li>
                                                    {{$item->created_at}}
                                                </li>
                                            </ul>
                                        </div>
                                        <h6 class="post-title">
                                            <a href="{{url('news/'.$item->id.'/'.$item->slug)}}">{!!  $item->title!!}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="b-features wow fadeInUp">
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="features-item">
                    <div class="text-center">
                        <div class="features-icon">
                            <span class="ef icon_heart_alt"></span>
                        </div>
                        <div class="feature-text text-left">
                            <p class="text-uppercase">Sáng tạo</p>
                            <p><span>Luôn luôn đổi mới</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="features-item">
                    <div class="text-center">
                        <div class="features-icon">
                            <span class="ef icon_percent"></span>
                        </div>
                        <div class="feature-text text-left">
                            <p class="text-uppercase">Đẳng cấp</p>
                            <p><span>Chất lượng hàng đầu</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="features-item">
                    <div class="text-center">
                        <div class="features-icon">
                            <span class="ef icon_like"></span>
                        </div>
                        <div class="feature-text text-left">
                            <p class="text-uppercase">Tận tình</p>
                            <p><span>Chăm sóc khách hàng</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

