<div class="form-body">
    @include('partials.admin.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;Bạn có một số lỗi biểu mẫu. Vui lòng kiểm tra bên dưới
    </div>

    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Tiêu đề <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('title', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('title', '<span id="title-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Link</label>
        <div class="col-md-4">
            {!! Form::text('link', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('link', '<span id="description-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('images') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Ảnh bìa <span class="required"> * </span></label>
        <div class="col-md-4">
            @if(isset($slide))
                <img src="{{$slide->image}}" alt="" WIDTH="100"/>
            @endif
            {!! Form::file('images', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('images', '<span id="description-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Nội dung<span class="required"> * </span></label>
        <div class="col-md-8">
            {!! Form::textarea('description', null, ['class' => 'form-control ckeditor ']) !!}
            {!! $errors->first('description', '<span id="description-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">thể loại đề thi &nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!!
                      Form::select('type',
                       [
                         '0' => 'Banner',
                         '1' => 'Quảng cáo trái',
                         '2' => 'Quảng cáo phải',
                       ],null,['id'=>'btstatus'])
                     !!}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Tình trạng&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!! Form::checkbox('status', '1', (isset($slide->status) && $slide->status == 0) ? false : true, ['class' => 'margin-top-10']) !!}
                </label>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
                <a href="{{ url('admin/slide') }}" class="btn default">Hủy</a>
            </div>
        </div>
    </div>
</div>





