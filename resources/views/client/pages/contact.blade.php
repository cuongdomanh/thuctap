@extends('client.layouts.index')
@section('content')
    <section class="section-contact">
        <div class="b-page-header">
            <div class="container">
                <div class="b-hat">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h2 class="page-title wow fadeInLeft">Liên hệ</h2>
                            <div class="b-breadcrumbs wow fadeInUp">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{'home'}}">Home</a>
                                    </li>
                                    <li>
                                        <span>Liên hệ</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @include('client.partials.alert')
                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 wow fadeInLeft">
                    <div class="b-contact-info">
                        <div class="info-block">
                            <p class="legend-mod">Địa chỉ</p>
                            <p>Số 6, phố Cao Sơn, P.An Hoạch, TP. Thanh Hóa (Cầu Cao).</p>
                            <p><span>Số điện thoại: 02376.518.666</span>
                                <span>Hotline: 0962.266.104 - 0969.138.281</span>
                            </p>
                        </div>
                        <div class="info-block">
                            <p class="legend-mod">Thời gian làm việc</p>
                            <p>Thứ 2 đến 7: 7h đến 21h </p>
                        </div>
                    </div>
                    <div id="success"></div>
                    <form novalidate id="contactForm" class="b-form" action="{{ url('postcontact') }}" method="POST">
                        <div class="form-group">
                            <p class="legend-mod">Gửi tin nhắn</p>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="row">
                                <div class="col-xs-6 col-sm-6">
                                    <input type="text" class="form-control" id="form-first-name"
                                           placeholder="Tên" name="name">
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <input type="email" class="form-control" id="form-email" placeholder="Email"
                                           name="email">
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <input type="text" class="form-control" id="form-phone"
                                           placeholder="Số điện thoại" name="phone">
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <input type="text" class="form-control" id="form-address" placeholder="Địa chỉ"
                                           name="address">
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <input type="text" class="form-control" id="form-title" placeholder="Chủ đề"
                                           name="title">
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <textarea id="form-comment" class="form-control" rows="6"
                                              placeholder="Nội dung" name="message"></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary-arrow btn-sm-arrow">
                                        Gửi tin nhắn
                                        <span class="ef icon_minus-06 "></span>
                                        <span class="ef arrow_right"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="bigMap" class="b-map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
