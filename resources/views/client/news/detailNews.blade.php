@extends('client.layouts.index')
@section('content')
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=1874900492831150";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    {{--<section class="section-blog-post">--}}

    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">--}}
    {{--<div class="b-post-comments">--}}
    {{--<div class="b-comments-holder">--}}
    {{--<div class="comment-item clearfix wow fadeInLeft">--}}
    {{--//////////////////////PLUGIN FACEBOOK//////////////--}}
    {{--<meta property="fb:app_id" content="1874900492831150" />--}}
    {{--<meta property="fb:admins" content="100001795823536"/>--}}
    {{--<div class="fb-comments"--}}
    {{--data-href="{{url('news/'.$news->id.'/'.$news->slug)}}"--}}
    {{--data-numposts="5" data-order-by="reverse_time"></div>--}}
    {{--//////////////////////PLUGIN FACEBOOK//////////////--}}
    {{--</div>--}}
    {{--<div class="comment-item clearfix wow fadeInLeft">--}}
    {{--<div class="userpic">--}}
    {{--<img src="media/blog/userpics/user1.png" class="img-circle" alt="/">--}}
    {{--</div>--}}
    {{--<div class="comment-body">--}}
    {{--<div class="comment-author">--}}
    {{--<ul class="list-inline">--}}
    {{--<li class="name">--}}
    {{--Sam Miller--}}
    {{--</li>--}}
    {{--<li class="date">--}}
    {{--1 day ago--}}
    {{--</li>--}}
    {{--<li class="reply">--}}
    {{--<button class="btn-reply"><span class="ef arrow_back"></span>Reply</button>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="comment-text">--}}
    {{--<p>--}}
    {{--Lorem ipsum dolor sit amet, consectetu adipisic elit sed do eiusmod tempo incididunt ut laboret dolore--}}
    {{--magna aliqua enim ad minim tempor incididunt ut labore et dolore.--}}
    {{--</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@include('client.partials.sidebar')--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</section>--}}
    <section class="section-blog-post">
        <div class="b-page-header">
            <div class="container">
                <div class="b-hat">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h2 class="page-title wow fadeInLeft">Bài viết</h2>
                            <div class="b-breadcrumbs wow fadeInUp">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{ url('/') }}">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="{{url('news')}}">Bài viết</a>
                                    </li>
                                    <li>
                                        <span>{{$news->title}}</span>
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
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="b-post">
                        <div class="post-caption">
                            <h4 class="post-title">
                                <a href="blog-post.html">{{ $news->title }}</a>
                            </h4>
                            <div class="caption">
                                <div class="post-description wow fadeInUp">
                                </div>
                                <div class="b-post-content">
                                    <div class="b-text">
                                        {!! $news->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="b-post-tags-holder clearfix">
                        <div class="pull-left wow fadeInLeft">
                            {{--<div class="b-tags-post">--}}
                            {{--<ul class="list-inline">--}}
                            {{--<li>--}}
                            {{--<a href="blog-post.html#" class="btn btn-tag active">furniture</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="blog-post.html#" class="btn btn-tag">Relax chairs</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="blog-post.html#" class="btn btn-tag">accessories</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<a href="blog-post.html#" class="btn btn-tag">indoor</a>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                        </div>
                        <div class="pull-right wow fadeInRight">
                            <div class="b-socials clearfix">
                                <ul class="list-inline">
                                    <li><a href="https://twitter.com/"><i class="fa fa-twitter fa-fw"></i></a></li>
                                    <li><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-fw"></i></a>
                                    </li>
                                    <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin fa-fw"></i></a>
                                    </li>
                                    <li><a href="https://vimeo.com/"><i class="fa fa-vimeo fa-fw"></i></a></li>
                                    <li><a href="blog-post.html#"><i class="fa fa-rss fa-fw"></i></a></li>
                                    <li><a href="https://plus.google.com/"><i class="fa fa-google-plus fa-fw"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="b-related-posts">
                        <h5 class="text-uppercase">Bạn có thể thích</h5>
                        <div class="b-posts-holder">
                            <div class="row">
                                @foreach($newsRandom as $item)
                                    <div class="col-xs-12 col-sm-6 wow fadeIn">
                                        <div class="b-post-preview">
                                            <div class="post-image">
                                                <div class="post-img-holder">
                                                    <img src="{{ url('uploads/news/'. $item->thumbnail) }}"
                                                         class="img-responsive center-block" style="width: 360px;height: 300px" alt="/">
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
                                                    <a href="{{url('news/'.$item->id.'/'.$item->slug)}}">{{$item->title}}</a>
                                                </h6>
                                                <div class="caption">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="b-post-comments">
                        <h5 class="text-uppercase">Bình luận <span class="comments-counter">(2)</span></h5>
                        <div class="b-comments-holder">
                            <div class="comment-item clearfix wow fadeInLeft">
                                {{--//////////////////////PLUGIN FACEBOOK//////////////--}}
                                <meta property="fb:app_id" content="1874900492831150"/>
                                <meta property="fb:admins" content="100001795823536"/>
                                <div class="fb-comments"
                                     data-href="{{url('news/'.$news->id.'/'.$news->slug)}}"
                                     data-numposts="5" data-order-by="reverse_time"></div>
                                {{--//////////////////////PLUGIN FACEBOOK//////////////--}}
                            </div>
                        </div>
                    </div>
                </div>
                @include('client.partials.sidebar')
            </div>
        </div>
    </section>
@endsection
