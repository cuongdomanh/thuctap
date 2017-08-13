<section class="main-slider">
    <div class="slider-pro full-width-slider" id="main-slider" data-width="100%" data-height="800" data-fade="true"
         data-buttons="true" data-arrows="false" data-next-slide=".pro-next" data-previous-slide=".pro-prev"
         data-wait-for-layers="true" data-thumbnail-pointer="false" data-touch-swipe="false" data-autoplay="true"
         data-auto-scale-layers="true" data-visible-size="100%" data-force-size="fullWidth" data-autoplay-delay="5000">
        <div class="sp-slides">
            @foreach($banner as $key=>$item)
                @if($key==0)
                    <div class="sp-slide slide-1 b-home-big-text">
                        <img class="sp-image" src="{{$item->image}}"
                             data-src="{{$item->image}}"
                             data-retina="{{$item->image}}" style="max-width: 1920px;max-height: 800px" alt="/"/>
                        <div class="container">
                            <div class="sp-layer layer-1-1 slide-tex-1 text-center"
                                 data-vertical="13%"
                                 data-show-transition="top" data-hide-transition="up" data-show-delay="600"
                                 data-hide-delay="100">
                                <h4 class="text-uppercase">
                                    {{$item->title}}
                                </h4>
                            </div>
                            <div class="sp-layer layer-1-2 slide-tex-1 text-center"
                                 data-vertical="20%"
                                 data-show-transition="left" data-hide-transition="up" data-show-delay="600"
                                 data-hide-delay="100">
                                {!! $item->description !!}
                            </div>
                            <div class="sp-layer layer-1-3 slide-button text-center"
                                 data-vertical="36%"
                                 data-show-transition="bottom" data-hide-transition="up" data-show-delay="1000">
                                <a href="{!! $item->link !!}" class="btn btn-primary-arrow btn-sm-arrow">
                                    Xem chi tiết
                                    <span class="ef arrow_right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @if($key==1)
                    <div class="sp-slide slide-2 b-home-big-text">
                        <img class="sp-image" src="{{$item->image}}"
                             data-src="{{$item->image}}"
                             data-retina="{{$item->image}}" style="max-width: 1920px;max-height: 800px" alt="/"/>
                        <div class="container">
                            <div class="sp-layer layer-2-1 slide-tex-2 text-left"
                                 data-vertical="25%"
                                 data-show-transition="top" data-hide-transition="up" data-show-delay="600"
                                 data-hide-delay="100">
                                <h4>
                                    {{$item->title}}
                                </h4>
                            </div>
                            <div class="sp-layer layer-2-2 slide-tex-2 text-left"
                                 data-vertical="33%"
                                 data-show-transition="right" data-hide-transition="up" data-show-delay="600"
                                 data-hide-delay="100">
                                {!! $item->description !!}
                            </div>
                            <div class="sp-layer layer-2-4 slide-button text-left"
                                 data-vertical="67%"
                                 data-show-transition="top" data-hide-transition="up" data-show-delay="1000">
                                <a href="{!! $item->link !!}" class="btn btn-primary-arrow btn-sm-arrow">
                                    Xem chi tiết
                                    <span class="ef arrow_right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="b-pro-contr">
        <div class="pro-next">
            <span></span>
        </div>
        <div class="contr-divider"></div>
        <div class="pro-prev">
            <span></span>
        </div>
    </div>
</section>
