@extends('client.layouts.index')
@section('content')
    <section class="section-blog-main">
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
                                        <span>Bài viết</span>
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
                <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                    <div class="b-posts-holder">
                        @foreach($news as $item)
                            <div class="b-post-preview wow fadeInLeft index.{{ $item->id }}">
                                <div class="post-image">
                                    <div class="post-img-holder">
                                        <img src="{{ url('uploads/news/'. $item->thumbnail) }}" class="img-responsive center-block" alt="/"  style="max-width: 780px; max-height: 350px">
                                    </div>
                                </div>
                                <div class="post-caption">
                                    <h4 class="post-title">
                                        <a href="{{url('news/'.$item->id.'/'.$item->slug)}}">{{$item->title}}</a>
                                    </h4>
                                    <div class="post-author">
                                        {{--<ul class="list-inline">--}}
                                            {{--<li>--}}
                                                {{--<span class="ef icon_profile"></span>--}}
                                                {{--John Smith--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<span class="ef icon_clock"></span>--}}
                                                {{--{{$item->created_at}}--}}
                                            {{--</li>--}}
                                            {{--<li>--}}
                                                {{--<span class="ef icon_comment"></span>--}}
                                                {{--26--}}
                                            {{--</li>--}}
                                        {{--</ul>--}}
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--<div class="pani">--}}
                        {{--<ul class="pagination pull-right">--}}
                            {{--<li>--}}
                                {{--{!! $news->appends(Request::only('keyword'))->links() !!}--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
                @include('client.partials.sidebar')
            </div>
        </div>
        @include('client.partials.pagination')
    </section>
@endsection
