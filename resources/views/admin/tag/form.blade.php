<div class="form-body">
    @include('partials.admin.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;
        &nbsp;Bạn có một số lỗi biểu mẫu. Vui lòng kiểm tra bên dưới
    </div>
    <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;
        Xác nhận mẫu của bạn đã thành công!
    </div>

    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Tiêu đề <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('title', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('title', '<span id="title-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    @if(isset($product_id))
        <input type="hidden" name="product_id" value="{{$product_id}}">
    @endif
    @if(isset($news_id))
        <input type="hidden" name="news_id" value="{{$news_id}}">
    @endif
    <div>
       <center>
        <button type="button" class="btn btn-default btn-sm" id="booktag">
            <span class="glyphicon glyphicon-tag"></span> Sản phẩm
        </button>
        <button type="button" class="btn btn-default btn-sm" id="coursetag">
            <span class="glyphicon glyphicon-tag"></span> Tin tức
        </button>
       </center>
    </div>
    <div class="form-group" id="booktagcheckbox">
        <label class="control-label col-md-3"> Sản phẩm&nbsp;&nbsp;&nbsp;&nbsp</label>
        <div class="col-md-9">
            <div class="checkbox-list margin-top-10">

                <table width="80%">
                    @foreach($product as $key=>$item)
                        <?php
                        if(isset($product_id) &&$item->id==$product_id){
                            continue;
                        }
                        ?>
                        @if($key % 3==0)
                            <tr>
                                @endif
                                <td>
                                    {!! Form::checkbox('product[]', $item->id,(isset($productTag[$item->id]))?true:false, ['class' => 'margin-top-10']) !!}
                                </td>

                                <td>{{$item->title}}</td>

                                @if($key %3==2)
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="form-group" id="coursetagcheckbox">
        <label class="control-label col-md-3"> Tin tức&nbsp;&nbsp;&nbsp;&nbsp</label>
        <div class="col-md-9">
            <div class="checkbox-list margin-top-10">

                <table width="80%">
                    @foreach($news as $key=>$item)
                        <?php
                        if(isset($news_id) && $item->id==$news_id){
                            continue;
                        }
                        ?>
                        @if($key % 3==0)
                            <tr>
                                @endif
                                <td>
                                    {!! Form::checkbox('news[]', $item->id,(isset($newsTag[$item->id]))?true:false, ['class' => 'margin-top-10']) !!}
                                </td>
                                <td>{{$item->title}}</td>
                                @if($key %3==2)
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Tình trạng&nbsp;&nbsp;&nbsp;&nbsp</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!! Form::checkbox('status', '1', (isset($tag->status) && $tag->status == 0) ? false : true, ['class' => 'margin-top-10']) !!}
                </label>
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/tag') }}" class="btn default">Hủy</a>
        </div>
    </div>
</div>


