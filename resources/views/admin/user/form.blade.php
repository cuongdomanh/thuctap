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

    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Hiển thị tên <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::text('name', null, ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('name', '<span id="name-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label class="col-md-3 control-label">Email <span class="required"> * </span></label>
        <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address', 'data-required' => '1']) !!}
                {!! $errors->first('email', '<span id="email-error" class="help-block help-block-error">:message</span>') !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Mật khẩu <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::password('password', ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('password', '<span id="password-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Nhập lại mật khẩu <span class="required"> * </span></label>
        <div class="col-md-4">
            {!! Form::password('password_confirmation', ['class' => 'form-control', 'data-required' => '1']) !!}
            {!! $errors->first('password_confirmation', '<span id="password_confirmation-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('thumbnail') ? 'has-error' : ''}}">
        <label class="control-label col-md-3">Ảnh đại diện </label>
        <div class="col-md-4">
            {!! Form::file('thumbnail', null, ['class' => 'form-control', 'data-required' => '1', 'files'=>true, 'method' =>'post', 'url' => 'admin/user']) !!}
            {!! $errors->first('thumbnail', '<span id="name-error" class="help-block help-block-error">:message</span>') !!}
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Tình trạng&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!! Form::checkbox('status', '1', (isset($user->status) && $user->status == 0) ? false : true, ['class' => 'margin-top-10']) !!}
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Phân quyền <span class="required"> * </span></label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                @foreach($roles as $key => $role)
                    <label>
                        {!! Form::checkbox('roles[]', $key, (isset($userRole) && in_array($key, $userRole)), ['class' => 'margin-top-10']) !!}
                        {{ $role }}
                    </label>
                @endforeach
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Đã kích hoạt&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!! Form::checkbox('is_activated', '1', (isset($user->is_activated) && $user->is_activated == 1) ? true : false, ['class' => 'margin-top-10']) !!}
                </label>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <div class="row">
            <div class="col-md-offset-3 col-md-9">
                {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
                <a href="{{ url('admin/user') }}" class="btn default">Cancel</a>
            </div>
        </div>
    </div>
</div>

