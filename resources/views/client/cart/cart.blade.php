@extends('client.layouts.index')

@section('content')
    <section class="section-shopping-cart">
        <div class="b-checkout-heading">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="heading checkout-heading text-center">
                            <h2><strong>Giỏ hàng</strong></h2>
                        </div>
                        <div class="b-check-state wow fadeInUp">
                            <div class="check-position current-check">
                                <p class="check-icon">
                                    <span class="ef icon_cart_alt"></span>
                                </p>
                                <p>
                                    <span class="text-uppercase"><strong>Đặt hàng</strong></span>
                                </p>
                            </div>
                            <div class="check-arrow">
                                <span class="ef arrow_right"></span>
                            </div>
                            <div class="check-position">
                                <p class="check-icon">
                                    <span class="ef icon_creditcard"></span>
                                </p>
                                <p>
                                    <span class="text-uppercase"><strong>Kiểm tra thông tin</strong></span>
                                </p>
                            </div>
                            <div class="check-arrow">
                                <span class="ef arrow_right"></span>
                            </div>
                            <div class="check-position">
                                <p class="check-icon">
                                    <span class="ef icon_archive_alt "></span>
                                </p>
                                <p>
                                    <span class="text-uppercase"><strong>Giao hàng</strong></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            @include('client.partials.alert')
        </div>
        <div class="b-table-cart">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="table-cart">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>chi tiết sản phẩm</th>
                                        <th>số lượng</th>
                                        <th>cập nhật</th>
                                        <th>đơn giá</th>
                                        <th>tổng tiền(VND)</th>
                                        <th>xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(Cart::content() as $item)
                                        <tr class="wow fadeInLeft">
                                            <td class="product">
                                                <div class="b-item-card">
                                                    <div class="product-image">
                                                        <a href="product-detail.html">
                                                            <img src="{{ url($item->options->thumbnail) }}" alt="/"
                                                                 style="max-width: 200px; max-height: 100px;">
                                                        </a>
                                                    </div>
                                                    <div class="caption">
                                                        <p class="product-name">
                                                            {{ $item->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>

                                            {!! Form::open(['method' => 'GET', 'url' => ['addcart', $item->id]]) !!}
                                            <td class="quantity">
                                                <div class="b-quantity">
                                                    <div class="input-group spinner" data-trigger="spinner">
                                                        <input name="qty" type="text" data-rule="quantity"
                                                               value="{{ $item->qty }}">
                                                        <div class="spinner-btn">
                                                            <a class="btn btn-default" href="javascript:;"
                                                               data-spin="up"><i class="fa fa-angle-up"></i></a>
                                                            <a class="btn btn-default" href="javascript:;"
                                                               data-spin="down"><i class="fa fa-angle-down"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td clear text-center>
                                                <button class="btn-clear" type="submit">
                                                    <span class="ef icon_pencil-edit_alt"></span>
                                                </button>
                                            </td>
                                            {!! Form::close() !!}
                                            <td class="price">
                                                <div class="caption">
                                                    <p class="product-price">
                                                        {{ number_format($item->price) }}
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="subtotal">
                                                <div class="caption">
                                                    <p class="product-price">
                                                        <span class="subtotal">
                                                            {{ number_format($item->options->amount) }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </td>
                                            <td class="clear text-center">
                                                {!! Form::open(['method' => 'DELETE', 'url' => ['cart', $item->id]]) !!}
                                                <button class="btn-clear" type="submit">
                                                    <span class="ef icon_trash_alt"></span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                        <tr class="spacer">
                                            <td colspan="6"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="cart-buttons clearfix">
                            <div class="pull-left">
                                <a href="{{ url('deleteall') }}" class="btn btn-default btn-sm">xóa giỏ hàng</a>
                            </div>
                            <div class="pull-right" style="padding-right: 25px;">
                                <a href="{{ url('product') }}" class="btn btn-primary-arrow btn-sm-arrow">
                                    tiếp tục mua hàng
                                    <span class="ef icon_minus-06 "></span>
                                    <span class="ef arrow_right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-shipping-total">
            <div class="container">
                {!! Form::open(['method' => 'POST', 'url' => 'order', 'class' => 'b-form']) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 wow fadeInDown">
                        <div class="b-coupon">
                            <p class="legend-mod">thông tin của bạn</p>
                            @if(Auth::check())
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12">
                                            {!! Form::text('address', null, ['class' => 'form-control',
                                                                             'data-required' => '1',
                                                                             'placeholder' => 'địa chỉ *'
                                                                            ])!!}
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            {!! Form::text('phone', null, ['class' => 'form-control',
                                                                           'data-required' => '1',
                                                                           'placeholder' => 'số điện thoại *'
                                                                          ]) !!}
                                        </div>
                                        <div class="col-xs-12 col-sm-12">
                                            {!! Form::text('note', null, ['class' => 'form-control',
                                                                          'data-required' => '1',
                                                                          'placeholder' => 'ghi chú *'
                                                                         ]) !!}
                                        </div>
                                    </div>
                                </div>
                            @else
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        {!! Form::text('name', null, ['class' => 'form-control',
                                                                      'data-required' => '1',
                                                                      'placeholder' => 'họ tên *'
                                                                     ]) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        {!! Form::text('address', null, ['class' => 'form-control',
                                                                         'data-required' => '1',
                                                                         'placeholder' => 'địa chỉ *'
                                                                        ]) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        {!! Form::text('phone', null, ['class' => 'form-control',
                                                                       'data-required' => '1',
                                                                       'placeholder' => 'số điện thoại *'
                                                                      ]) !!}
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        {!! Form::text('note', null, ['class' => 'form-control',
                                                                      'data-required' => '1',
                                                                      'placeholder' => 'ghi chú *'
                                          ]) !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 wow fadeInRight">
                        <div class="">
                            <p class="legend-mod">tổng tiền</p>
                        </div>
                        <div class="b-total">
                            <div class="table-total">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="text-right">
                                            Tổng tiền(VND)
                                        </td>
                                        <td class="text-right">
                                            <strong>
                                                {{number_format(floatval(str_replace(',', '', Cart::subtotal())))}}
                                                <input type="hidden" name="subtotal"
                                                       value="{{ floatval(str_replace(',', '', Cart::subtotal())) }}" />
                                            </strong>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-secondary-arrow btn-sm-arrow">
                                    xác nhận đơn hàng
                                    <span class="ef icon_minus-06 "></span>
                                    <span class="ef arrow_right"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection