<div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
    <div class="lb-content wow fadeInRight">
        <div class="l-box-mod">
            <div class="heading-line">
                <h2 class="text-uppercase">tìm kiếm</h2>
            </div>
            <div class="search-wrapper">
                <div id="search-lb">
                    {!! Form::open(['method' => 'GET', 'url' => '/news']) !!}
                    <div class="form-group">
                        <input id="side-search" name="keyword" type="search"
                               value="@if(Request::has('keyword')){{ Request::get('keyword') }}@endif">
                        <span class="ef icon_search "></span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="l-box-mod">
            <div class="heading-line">
                <h2 class="text-uppercase">
                    <a href="{{ url('news/') }}">
                        Danh mục bài viết
                    </a>
                </h2>
            </div>
            <div class="b-list long-arrow-right">
                <ul class="list-unstyled">
                    @foreach($listNewsCategory as $item)
                        @if($item->parent_id != 0)
                            <li>
                                <a href="{{ url('news/'.$item->id) }}">
                                    {{ $item->title }}
                                    <span class="cat-counter"></span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="l-box-mod">
            <div class="heading-line">
                <h2 class="text-uppercase">bài viết mới nhất</h2>
            </div>
            <div class="b-list recent-posts long-arrow-right">
                <ul class="list-unstyled">
                    @foreach($listNew as $item)
                        <li>
                            <a href="{{ url('news/'.$item->id.'/'.$item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="l-box-mod">
            <div class="heading-line">
                <h2 class="text-uppercase">sản phẩm mới nhất</h2>
            </div>
            <div class="b-items-holder clearfix">
                @foreach($productNews as $item)
                    <a href="{{ url('product/'.$item->id.'/'.$item->slug) }}" class="b-item-card">
                        <div class="product-image">
                            <img src="{{ url($item->thumbnail) }}" style="max-width: 85px; max-height: 85px" alt="/">
                        </div>
                        <div class="caption">
                            <p class="product-name">
                                {{ $item->title }}
                            </p>
                            <p class="product-price">
                                <span>Giá:</span>
                                @if($item->price == 0)
                                    <span>Liên hệ</span>
                                @else
                                    <span>{{ number_format($item->price) }} VND</span>
                                @endif
                            </p>
                        </div>
                    </a>
                    <br>
                @endforeach
            </div>
        </div>
        <div class="l-box-mod">
            <div class="heading-line">
                <h2 class="text-uppercase">Tag</h2>
            </div>
            <div class="b-tags">
                <ul class="list-inline">
                    @foreach($tagItems as $tag)
                        <li>
                            <a href="{{url('news/tag/'.$tag->id)}}" class="btn btn-tag">
                                {{ $tag->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
