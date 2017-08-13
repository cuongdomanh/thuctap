<div class="form-body">
    @include('partials.admin.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;
        Đã xảy ra lỗi. Vui lòng kiểm tra lại.
    </div>
    <div class="alert alert-success display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;
        Chúc mừng!
    </div>
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Tiêu đề <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('title', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('title', '<span id="title-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Thuộc danh mục</label>
        <div class="col-md-4">
            <div class="checkbox-list">
                <select class="checkbox-list margin-top-10" name="category_id">
                    @if(isset($list))
                        @foreach($list as $item)
                            @if($item->parent_id != 0)
                            <option value="{{ $item->id }}" {{ (isset($news) && $news->category_id == $item->id) ? "selected" : ""   }}>
                                {{ $item->title }}
                            </option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('thumbnail') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Ảnh đại diện<span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::file('thumbnail', ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('thumbnail', '<span id="thumbnail-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Nội dung <span class="required"> * </span></label>
        <div class="col-md-8">
            {!! Form::textarea('content', null, ['class' => 'form-control ckeditor ']) !!}
            {!! $errors->first('content', '<span id="content-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Thẻ&nbsp;&nbsp;&nbsp;&nbsp</label>
        <div class="col-md-9">
            <div class="checkbox-list margin-top-10">
                <div class="scroll" style="height: 100px;overflow-y: scroll ; width:90%">
                    <table width="99%">
                        @foreach($tag as $key=>$item)
                            @if($key % 3==0)
                                <tr>
                                    @endif
                                    <td>
                                        {!! Form::checkbox('tag[]', $item->id,(isset($newsTag[$item->id])) ? true : false, ['class' => 'margin-top-10']) !!}
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
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Kích hoạt &nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!! Form::checkbox('status', '1', (isset($cate->status) && $cate->status == 0) ? false : true, ['class' => 'margin-top-10']) !!}
                </label>
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/news') }}" class="btn default">Hủy</a>
        </div>
    </div>
</div>