@extends('client.layouts.index')

@section('content')
    <section class="section-shopping-cart">
        <div class="b-checkout-heading">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="heading checkout-heading text-center">
                            <h2><strong>kiểm tra thông tin</strong></h2>
                        </div>
                        <div class="b-check-state wow fadeInUp">
                            <div class="check-position current-check">
                                <p class="check-icon">
                                    <span class="ef icon_cart_alt"></span>
                                </p>
                                <p>
                                    <span class="text-uppercase"><strong>đặt hàng</strong></span>
                                </p>
                            </div>
                            <div class="check-arrow">
                                <span class="ef arrow_right"></span>
                            </div>
                            <div class="check-position current-check">
                                <p class="check-icon">
                                    <span class="ef icon_creditcard"></span>
                                </p>
                                <p>
                                    <span class="text-uppercase"><strong>kiểm tra thông tin</strong></span>
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
                                    <span class="text-uppercase"><strong>giao hàng</strong></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="b-billing-order">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 wow fadeInRight">
                        <div class="">
                            <p class="legend-mod">hóa đơn của bạn</p>
                            <div class="b-order-summary">
                                <ul class="list-unstyled">
                                    <li class="clearfix">
                                        <div class="order-name pull-left">Họ tên</div>
                                        <div class="caption pull-right">
                                            <p class="product-price">
                                                {{ $order->name }}
                                            </p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="order-name pull-left">Địa chỉ</div>
                                        <div class="caption pull-right">
                                            <p class="product-price">
                                                {{ $order->address }}
                                            </p>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="order-name pull-left">Số điện thoại</div>
                                        <div class="caption pull-right">
                                            <p class="product-price">
                                                {{ $order->phone }}
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                                <ul class="order-total list-unstyled">
                                    <li class="clearfix">
                                        <div class="order-name text-uppercase pull-left">tổng tiền(vnd)</div>
                                        <div class="caption pull-right">
                                            <p class="product-price">
                                                {{ number_format($order->total_amount) }}
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            {!! Form::open(['method' => 'GET', 'url' => 'destroycart/'.$order->id]) !!}
                            <button type="submit" class="btn btn-secondary-arrow btn-sm-arrow">
                                xác nhận
                                <span class="ef icon_minus-06 "></span>
                                <span class="ef arrow_right"></span>
                            </button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection