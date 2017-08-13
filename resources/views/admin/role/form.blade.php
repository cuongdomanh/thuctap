<div class="form-body">
    @include('partials.admin.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;Đã xảy ra lỗi. Vui lòng kiểm tra lại.
    </div>

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Tên quyền <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('name', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('name', '<span id="name-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('display_name') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Hiển thị tên<span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('display_name', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('display_name', '<span id="display_name-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
        <label class="col-md-3 control-label">Mô tả <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('description', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('description', '<span id="description-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Cho phép: <span class="required"> * </span></label>
        <div class="col-md-6">
            <div class="checkbox-list margin-top-10">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Chức năng </th>
                                <th> Hiển thị </th>
                                <th> Thêm mới </th>
                                <th> Sửa đổi </th>
                                <th> Xóa </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td> {{ $permission['title'] }} </td>
                                    @foreach($permission['items'] as $item)
                                        <td> {{ Form::checkbox('permission[]', $item->id, (isset($rolePermissions) && in_array($item->id, $rolePermissions)) ? true : false, array('class' => 'name')) }} </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
                <a href="{{ url('admin/role') }}" class="btn default">Hủy</a>
        </div>
    </div>
</div>



