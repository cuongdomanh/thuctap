<div class="form-body">
    @include('partials.admin.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;Bạn có một số lỗi biểu mẫu. Vui lòng kiểm tra bên dưới
    </div>
    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Tiêu đề <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('title', null, ['class' => 'form-control', 'data-required' => '1' ]) !!}
            {!! $errors->first('title', '<span id="title-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Tiêu đề lớn</label>
        <div class="col-md-4">
            <div class="checkbox-list">
                <select class="checkbox-list margin-top-10" name="parent_id">
                    <option value="0" selected="selected">Danh mục cha</option>
                    @if(isset($listParent))
                        @foreach($listParent as $item)
                            <option value="{{ $item->id }}"
                                {{ (isset($cate) && ($cate->parent_id == $item->id && $cate->parent_id != 0)) ? "selected" : "" }}>
                                {{ $item->title }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Loại danh mục</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                {!!
                    Form::select('type', [
                    '0' => 'Menu',
                    '1' => 'Danh mục sản phẩm',
                    '2' => 'Danh mục bài viết'
                    ])
                !!}
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
            <a href="{{ url('admin/category') }}" class="btn default">Hủy</a>
        </div>
    </div>
</div>

