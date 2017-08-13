<div class="form-body">
    @include('partials.admin.alert')
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        &nbsp;Đã xảy ra lỗi. Vui lòng kiểm tra lại.
    </div>

    <div class="form-group">
        <label class="control-label col-md-3">Trạng thái&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <div class="col-md-4">
            <div class="checkbox-list margin-top-10">
                <label>
                    {!!
                      Form::select('status',
                       [
                         '0' => 'Chưa xem',
                         '1' => 'Đã xem',
                       ])
                     !!}
                </label>
            </div>
        </div>
    </div>
</div>

<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            {!! Form::submit('Lưu', ['class' => 'btn green']) !!}
            <a href="{{ url('admin/contact') }}" class="btn default">Hủy</a>
        </div>
    </div>
</div>


