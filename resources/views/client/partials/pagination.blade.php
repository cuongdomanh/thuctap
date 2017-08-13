<div class="b-long wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                {{--<div class="category-show text-uppercase pull-left">--}}
                {{--Showing <span>1</span> to <span>12</span> of <span>50</span> products--}}
                {{--</div>--}}
                @if(isset($news))
                    {!! $news->appends(Request::only('keyword'))->links() !!}
                @endif
                @if(isset($product))
                    <nav class="pull-right">
                        {{--<ul class="pagination pagination-mod-2">--}}
                        {{--<li class="pag-prev hidden">--}}
                        {{--<a href="category-1.html#" aria-label="Previous">Previous</a>--}}
                        {{--</li>--}}
                        {{--<li class="active"><a href="category-1.html#">1</a></li>--}}
                        {{--<li><a href="category-1.html#">2</a></li>--}}
                        {{--<li><a href="category-1.html#">3</a></li>--}}
                        {{--<li class="pag-next">--}}
                        {{--<a href="category-1.html#" aria-label="Next">Next</a>--}}
                        {{--</li>--}}
                        {!! $product->appends(Request::only('keyword'))->links() !!}
                        {{--</ul>--}}
                    </nav>
                @endif
            </div>
        </div>
    </div>
</div>
