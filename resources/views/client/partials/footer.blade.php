<footer>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1874900492831150";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <div class="pre-footer"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 center-block">
                <div class="b-footer-subsc">
                    <div class="subsc-title text-center">
                        <h4 class="heading-bold-merri">Đăng kí nhận bài viết</h4>
                        <p>Đăng ký nhận mail thông báo sản phẩm mới nhất, khuyến mãi đặt biệt</p>
                    </div>
                    <div class="subsc-mail">
                        <form id="comment-reply-form" class="b-form" method="POST" action="{{ url('subscribe') }}">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <div class="clearfix">
                                    <div class="col-xs-12 col-sm-6 col-sm-offset-2">
                                        <input type="email" class="form-control" id="form-mail" name="email" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <button type="submit" class="btn btn-primary-arrow btn-sm-arrow">
                                            Đăng ký
                                            <span class="ef icon_minus-06 "></span>
                                            <span class="ef arrow_right"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="b-footer-body container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center wow fadeIn">
                <div class="b-logo">
                    <img class="normal-logo " src="{{url('images/logo-2.png')}}"
                         alt="logo">
                </div>
                <div class="b-footer-contacts">
                    <div class="footer-contacts-list">
                        <ul class="list-unstyled">
                            <li>
                                Địa chỉ: số 6, phố Cao Sơn, P.An Hoạch
                            </li>
                            <li>
                                TP. Thanh Hóa (Cầu Cao).
                            </li>
                            <li>
                                Số điện thoại: 02376.518.666
                            </li>
                            <li>
                                Hotline: 0962.266.104 - 0969.138.281
                            </li>
                        </ul>
                    </div>
                </div>
                {{--<div class="b-socials clearfix">--}}
                    {{--<ul class="list-inline">--}}
                        {{--<li><a href="https://twitter.com/"><i class="fa fa-twitter fa-fw"></i></a></li>--}}
                        {{--<li><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-fw"></i></a></li>--}}
                        {{--<li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin fa-fw"></i></a></li>--}}
                        {{--<li><a href="https://vimeo.com/"><i class="fa fa-vimeo fa-fw"></i></a></li>--}}
                        {{--<li><a href="https://www.rss.com/"><i class="fa fa-rss fa-fw"></i></a></li>--}}
                        {{--<li><a href="https://plus.google.com/"><i class="fa fa-google-plus fa-fw"></i></a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="b-text text-right wow fadeInRight">
                    <iframe src="https://www.google.com/maps/d/embed?mid=1ROkBtY3mHhPPl17LHzGZZCPXsTQ" width="350"
                            height="300"></iframe>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                <div class="footer-menu-item wow fadeInLeft">
                    {{--<h6>Link nhanh</h6>--}}
                    <div class="fb-page" data-href="https://www.facebook.com/Moe-tan-1019457441402180/"
                         data-tabs="timeline" data-width="350" data-height="300" data-small-header="false"
                         data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                        <blockquote cite="https://www.facebook.com/Moe-tan-1019457441402180/"
                                    class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/Moe-tan-1019457441402180/">Moe-tan</a></blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="b-footer-add">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="clearfix">
                        <div class="b-copy pull-left">
                            <p>
                                © Bản quyền thuộc về <a href="home-1.html">Noithat3Ddep.</a>
                            </p>
                        </div>
                        <div class="b-payments pull-right">
                            <ul class="list-unstyled">
                                <li>
                                    <img src="{{url('media/paycards/payment-1.png')}}" class="img-responsive" alt="/">
                                </li>
                                <li><img src="{{url('media/paycards/payment-2.png')}}" class="img-responsive" alt="/">
                                </li>
                                <li><img src="{{url('media/paycards/payment-3.png')}}" class="img-responsive" alt="/">
                                </li>
                                <li><img src="{{url('media/paycards/payment-4.png')}}" class="img-responsive" alt="/">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
