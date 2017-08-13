@extends('client.layouts.index')
@section('content')
    <section class="section-category-2">
        <div class="b-page-header">
            <div class="container">
                <div class="b-hat">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <h2 class="page-title wow fadeInLeft">Thẻ tag</h2>
                            <div class="b-breadcrumbs wow fadeInUp">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="{{url('home')}}">Trang chủ</a>
                                    </li>
                                    <li>
                                        <span>Kết quả tìm kiếm </span>
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
                <div class="col-xs-12 col-sm-12">
                    <div class="b-category-rows">
                        <div class="row">
                            @if(isset($newsTag))
                                @foreach($newsTag->news as $item)
                                    <div class="col-xs-12 col-sm-6 wow fadeInLeft">
                                        <div class="b-item-card">
                                            <a href="{{url('news/'.$item->id.'/'.$item->slug)}}">
                                                <div class="product-image">
                                                    <img src="{{ url('uploads/news/'. $item->thumbnail) }}"
                                                         class="img-responsive center-block"
                                                         style="max-width: 480px;max-height: 210px"
                                                         alt="/">
                                                </div>
                                                <div class="caption">
                                                    <p class="product-name">
                                                        {{$item->title}}
                                                    </p>
                                                    <p class="product-price">
                                                        {{$item->created_at}}
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
