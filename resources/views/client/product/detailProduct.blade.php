@extends('client.layouts.index')
@section('content')
    <section class="section-product">
        <div class="container">
            <div class="b-page-header-mod">
                <div class="b-hat wow fadeInDown">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h2 class="page-title">Chi tiết sản phẩm</h2>
                            <br>
                            <div class="b-breadcrumbs">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{url('home')}}">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="{{url('about')}}">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <span>{{$product->title}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-product-details">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 wow fadeInUp">
                        <div class="product-image">
                            <div class="product-image-big">
                                <div class="b-product-socials">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="https://twitter.com/">
                                                <i class="fa fa-twitter fa-fw" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/">
                                                <i class="fa fa-facebook fa-fw" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://plus.google.com/">
                                                <i class="fa fa-google-plus fa-fw" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://pinterest.com/">
                                                <i class="fa fa-pinterest-p fa-fw" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <ul class="bxslider-product list-unstyled clearfix enable-bx-slider"
                                    data-pager-custom="#bx-pager" data-controls="false" data-min-slides="1"
                                    data-max-slides="1" data-slide-width="0" data-slide-margin="0" data-pager="true"
                                    data-mode="horizontal" data-infinite-loop="true">
                                    <li><img src="{{url($product->thumbnail)}}" style="max-height: 450px;max-width: 600px"
                                             alt="/"/></li>
                                    @foreach($product->image as $img)
                                        <li><img src="{{url($img->url)}}" style="max-height: 450px;max-width: 600px" alt="/"/>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="product-image-thumbs">
                                <ul id="bx-pager" class="pager-custom list-unstyled enable-bx-slider"
                                    data-pager-custom="null" data-controls="false" data-min-slides="1"
                                    data-max-slides="4" data-slide-width="121" data-slide-margin="8" data-pager="false"
                                    data-mode="horizontal" data-infinite-loop="false">
                                    <?php $i = 0?>
                                    <li>
                                        <a data-slide-index="0" href="product-detail.html#"><img
                                                    src="{{url($product->thumbnail)}}" style="max-height: 84px;max-width: 121px"
                                                    alt="/"/></a>
                                    </li>
                                    @foreach($product->image as $img)
                                        <?php $i++;?>
                                        <li>
                                            <a data-slide-index="{{$i}}" href="product-detail.html#"><img
                                                        src="{{url($img->url)}}" style="max-height: 84px;max-width: 121px"
                                                        alt="/"/></a>
                                        </li>
                                    @endforeach

                                    {{--<li>--}}
                                    {{--<a data-slide-index="1" href="product-detail.html#"><img--}}
                                    {{--src="media/product-detail/3.jpg" alt="/"/></a>--}}
                                    {{--</li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 wow fadeInRight">
                        <div class="product-info">
                            <p class="product-name">
                                {{$product->title}}
                            </p>
                            <div class="b-rating-availability">
                                <div class="rating">
                                    {{--<span class="star"><i class="fa fa-star"></i></span>--}}
                                    {{--<span class="star"><i class="fa fa-star"></i></span>--}}
                                    {{--<span class="star"><i class="fa fa-star"></i></span>--}}
                                    {{--<span class="star"><i class="fa fa-star"></i></span>--}}
                                    {{--<span class="star star-empty"><i class="fa fa-star-o"></i></span>--}}
                                    <span class="reviews-count">
												{{--<span class="review-counter">5</span> Bình luận--}}
											</span>
                                </div>
                                <div class="availability">
                                    <span>Còn hàng</span>
                                </div>
                            </div>
                            <p class="product-price">
                                <span>Giá:</span>
                               @if($product->price == 0)
                                   <span>Liên hệ</span>
                               @else
                                    <span>{{ number_format($product->price * ( 1 - $product->discount/100 )) }} VND</span>
                                    <span class="old-price">{{ number_format($product->price) }} VND</span>
                               @endif
                            </p>
                            <div class="b-text">
                                <p>
                                    {!!  $product->description!!}
                                </p>
                            </div>
                            {{--<div class="b-color-size">--}}
                            {{--<div class="row">--}}
                            {{--<div class="col-xs-6 col-sm-6">--}}
                            {{--<div class="b-color">--}}
                            {{--<span class="small-title">--}}
                            {{--color--}}
                            {{--</span>--}}
                            {{--<ul class="color-picker list-inline">--}}
                            {{--<li>--}}
                            {{--<a href="javascript:void(0);">--}}
                            {{--<img src="media/product-detail/colors/color1.jpg" alt="/">--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="javascript:void(0);">--}}
                            {{--<img src="media/product-detail/colors/color2.jpg" alt="/">--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="javascript:void(0);">--}}
                            {{--<img src="media/product-detail/colors/color3.jpg" alt="/">--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="javascript:void(0);">--}}
                            {{--<img src="media/product-detail/colors/color4.jpg" alt="/">--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="javascript:void(0);">--}}
                            {{--<img src="media/product-detail/colors/color5.jpg" alt="/">--}}
                            {{--</a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-6 col-sm-6">--}}
                            {{--<div class="b-size">--}}
                            {{--<span class="small-title">--}}
                            {{--size--}}
                            {{--</span>--}}
                            {{--<div class="b-filters clearfix">--}}
                            {{--<div class="size-options">--}}
                            {{--<select class="selectpicker" title="select size">--}}
                            {{--<option>8</option>--}}
                            {{--<option>12</option>--}}
                            {{--<option>16</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {!! Form::open(['method' => 'GET', 'url' => 'addcart/'.$product->id]) !!}
                            <div class="b-quantity-add">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-12 col-md-5 col-lg-4">
												<span class="small-title">
													Số lượng
												</span>
                                        <div class="b-quantity">
                                            <div class="input-group spinner" data-trigger="spinner">
                                                <input type="text" data-rule="quantity" value="1" name="qty">
                                                <div class="spinner-btn">
                                                    <a class="btn btn-default" href="javascript:;" data-spin="up"><i
                                                                class="fa fa-angle-up"></i></a>
                                                    <a class="btn btn-default" href="javascript:;" data-spin="down"><i
                                                                class="fa fa-angle-down"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-12 col-md-7 col-lg-8">
                                        <div class="b-add clearfix">
                                            <div class="pull-left">
                                                <button class="btn btn-primary btn-sm">Thêm giỏ hàng</button>
                                            </div>
                                            <div class="add-wish-buttons pull-right">
                                                <button class="btn btn-add">
                                                    <span class="ef icon_heart_alt"></span>
                                                </button>
                                                <button class="btn btn-add">
                                                    <span class="ef icon_mail_alt"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-product-description">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 wow fadeInUp">
                        <div class="product-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="product-detail.html#overview" aria-controls="overview" role="tab"
                                       data-toggle="tab">Mô tả sản phẩm</a>
                                </li>
                                {{--<li role="presentation">--}}
                                {{--<a href="product-detail.html#details" aria-controls="details" role="tab"--}}
                                {{--data-toggle="tab">Thông số kĩ thuật</a>--}}
                                {{--</li>--}}
                                <li role="presentation">
                                    <a href="product-detail.html#shipping" aria-controls="details" role="tab"
                                       data-toggle="tab">Vận chuyển và đổi trả</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="overview">
                                    <div class="overview-spec">
                                        <div>
                                            <p><span class="ef arrow_right"></span>Chịu nước, chịu mài mòn, dễ lau chùi
                                            </p>
                                            <p><span class="ef arrow_right"></span>Khách hàng có thể dặt hàng kích thước
                                                riêng theo từng không gian thiết kế cụ thể của mình</p>
                                            <p><span class="ef arrow_right"></span>Có thể thêm chữ hoặc ký tự theo ý
                                                thích của mình khi đặt hàng</p>
                                            <p><span class="ef arrow_right"></span>Đa chủng loại, phù hợp với tất cả
                                                phong cách</p>
                                            <p><span class="ef arrow_right"></span>Có hơn 700 mẫu tranh 3D PVC để lựa
                                                chọn</p>
                                        </div>
                                    </div>
                                    {{--<div class="b-text">--}}
                                    {{--<p>--}}
                                    {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod--}}
                                    {{--tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,--}}
                                    {{--quis nostrud exercitation ullamco--}}
                                    {{--laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in--}}
                                    {{--reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla--}}
                                    {{--pariatur. Excepteur sint occaecat cupidatat non--}}
                                    {{--proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed--}}
                                    {{--ut perspiciatis unde omnis iste natus error sit voluptatem accusantium--}}
                                    {{--doloremque laudantium, totam rem--}}
                                    {{--aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto--}}
                                    {{--beatae vitae dicta sunt explicabo.--}}
                                    {{--</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="b-text">--}}
                                    {{--<p>--}}
                                    {{--Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,--}}
                                    {{--sed quia consequuntur magni dolores eos qui ratione voluptatem sequi--}}
                                    {{--nesciunt. Neque porro quisquam est,--}}
                                    {{--qui dolorem ipsum quia dolor sit amet consectetur adipisci velit sed quia--}}
                                    {{--non numquam eius modi tempora incidunt labore dolore magnan.--}}
                                    {{--</p>--}}
                                    {{--</div>--}}
                                </div>
                                {{--<div role="tabpanel" class="tab-pane" id="details">--}}
                                {{--<div class="form-group">--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad--}}
                                {{--consectetur dicta dolorum earum eos et eum ex explicabo impedit--}}
                                {{--laboriosam, maxime nesciunt omnis porro ratione saepe, sapiente sint--}}
                                {{--totam, voluptas!--}}
                                {{--</p>--}}
                                {{--<p>Aliquam beatae cum cupiditate dolores excepturi facere harum impedit--}}
                                {{--iste laborum. Aspernatur cumque distinctio excepturi illum itaque minus--}}
                                {{--molestias nesciunt numquam, possimus recusandae ullam velit veritatis. A--}}
                                {{--et nulla repudiandae!--}}
                                {{--</p>--}}
                                {{--<p>Alias amet animi consequuntur culpa debitis dolorem esse expedita illum--}}
                                {{--labore numquam perspiciatis possimus praesentium quae quas quibusdam--}}
                                {{--reprehenderit repudiandae sint sit soluta suscipit, tenetur vero--}}
                                {{--voluptatibus! Illum neque, voluptatem!--}}
                                {{--</p>--}}
                                {{--<p>Alias amet asperiores culpa debitis dolor eligendi enim facere fugiat--}}
                                {{--hic, iusto laboriosam molestias mollitia nobis nulla possimus quasi quia--}}
                                {{--quod, soluta sunt voluptates? Dicta facilis fugit nostrum omnis sint.--}}
                                {{--</p>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                <div role="tabpanel" class="tab-pane" id="shipping">
                                    <div class="form-group">
                                        <p>
                                            Hãy liên hệ ngay với chúng tôi theo số:
                                        </p>
                                        <p>
                                            Tel : <strong>02376.518.666</strong> hoặc HOTLINE:
                                            <strong>0962.266.104</strong> để được tư vấn chi tiết.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-long">
            <div class="heading-big text-center wow fadeInUp">
                <div class="heading-icon">
                    <span class="ef icon_gift_alt"></span>
                </div>
                <h2>
                    <strong>Sản phẩm tương tự</strong>
                    <span>Các sản phẩm có mẫu mã đẹp và chất lượng tốt nhất</span>
                </h2>
            </div>
            <div class="b-related">
                <div class="container">
                    <div class="row">
                        @foreach($randomproduct as $item)
                            <div class="col-xs-6 col-sm-3 wow fadeInLeft">
                                <div class="b-item-card-mod">
                                    <div class="product-image">
                                        <a href="{{url('product/'.$item->id.'/'.$item->slug)}}">
                                            <img src="{{url($item->thumbnail)}}"
                                                 class="img-responsive center-block" style="max-width:250px;max-height: 190px"
                                                 alt="/">
                                        </a>
                                        <div class="b-card-buttons">
                                            <ul class="list-unstyled">
                                                {{--<li>--}}
                                                {{--<a href="shopping-cart.html">--}}
                                                {{--<span class="ef icon_cart_alt"></span>--}}
                                                {{--</a>--}}
                                                {{--</li>--}}
                                                {{--<li>--}}
                                                {{--<a href="product-detail.html#">--}}
                                                {{--<span class="ef icon_heart_alt "></span>--}}
                                                {{--</a>--}}
                                                {{--</li>--}}
                                                <li>
                                                    <a href="{{url('product/'.$item->id.'/'.$item->slug)}}">
                                                        <span class="ef icon_folder-add_alt"></span>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
