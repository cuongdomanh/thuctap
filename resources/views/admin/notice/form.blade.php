<div class="form-body">
    @include('partials.admin.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;Đã xảy ra lỗi. Vui lòng kiểm tra lại.
    </div>

    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Tiêu đề <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('title', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('title', '<span id="title-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('content1') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Nội dung<span class="required"> * </span></label>
        <div class="col-md-8">
            {!! Form::textarea('content1', null, ['class' => 'form-control ckeditor ']) !!}
            {!! $errors->first('content1', '<span id="message-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/notice') }}" class="btn default">Hủy</a>
        </div>
    </div>
</div>


