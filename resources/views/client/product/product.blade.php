@extends('client.layouts.index')
@section('content')
    <section class="section-category-1">
        <div class="container">
            <div class="b-page-header-mod">
                <div class="b-hat wow fadeInDown">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h2 class="page-title">Sản phẩm</h2>
                            <br>
                            <div class="b-breadcrumbs">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{url('home')}}">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="{{url('product')}}"><span>Sản phẩm</span></a>
                                    </li>
                                    {{--<li>--}}
                                    {{--<span>Chairs</span>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-xs-12 col-sm-12">--}}
                    {{--<div class="b-filters clearfix">--}}
                        {{--<form class="clearfix" action="category-1.html#" method="get">--}}
                            {{--<div class="filters-options pull-left">--}}
                                {{--<select class="selectpicker">--}}
                                    {{--<option>all brands</option>--}}
                                    {{--<option>one brand</option>--}}
                                    {{--<option>lorem ipsum</option>--}}
                                {{--</select>--}}
                                {{--<select class="selectpicker">--}}
                                    {{--<option>Best Sellers</option>--}}
                                    {{--<option>Top items</option>--}}
                                    {{--<option>lorem ipsum</option>--}}
                                {{--</select>--}}
                                {{--<select class="selectpicker">--}}
                                    {{--<option>chair Type</option>--}}
                                    {{--<option>chair style</option>--}}
                                    {{--<option>lorem ipsum</option>--}}
                                {{--</select>--}}
                                {{--<select class="selectpicker">--}}
                                    {{--<option>Color</option>--}}
                                    {{--<option>size</option>--}}
                                    {{--<option>lorem ipsum</option>--}}
                                {{--</select>--}}
                                {{--<input type="reset" value="Reset Filters" class="btn-reset-filter">--}}
                            {{--</div>--}}
                            {{--<div class="view-options pull-right">--}}
                                {{--<select class="selectpicker">--}}
                                    {{--<option>12 items</option>--}}
                                    {{--<option>18 items</option>--}}
                                    {{--<option>24 items</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="b-category-grid">
            <div class="container">
                <div class="row">
                    @foreach($product as $item)
                        <div class="col-xs-6 col-sm-3 wow fadeInUp">
                            <div class="b-item-card-mod">
                                <div class="product-image">
                                    <a href="{{url('product/'.$item->id.'/'.$item->slug)}}">
                                        <img src="{{url($item->thumbnail)}}"
                                             class="img-responsive center-block" alt="/"
                                             style="width: 180px;height: 210px">
                                    </a>
                                    <div class="b-card-buttons">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{ url('addcart/'. $item->id) }}">
                                                    <span class="ef icon_cart_alt"></span>
                                                </a>
                                            </li>
                                            {{--<li>--}}
                                            {{--<a href="category-1.html#">--}}
                                            {{--<span class="ef icon_heart_alt "></span>--}}
                                            {{--</a>--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                            {{--<a href="category-1.html#">--}}
                                            {{--<span class="ef icon_folder-add_alt"></span>--}}
                                            {{--</a>--}}
                                            {{--</li>--}}
                                        </ul>
                                    </div>
                                </div>
                                <div class="caption">
                                    <p class="product-name">
                                        {{$item->title}}
                                    </p>
                                    <p class="product-price">
                                        <span>Giá:</span>
                                        @if($item->price == 0 )
                                            <span>Liên hệ</span>
                                        @else
                                            <span>{{number_format($item->price)}} VND</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('client.partials.pagination')
    </section>
@endsection
