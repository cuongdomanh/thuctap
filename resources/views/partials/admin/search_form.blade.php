<div class="form-group form-md-line-input has-success form-md-floating-label margin-bottom-10 margin-top-10">
    <div class="input-icon right">
        <input type="text" class="form-control" name="keyword" value="@if(Request::has('keyword')){{ Request::get('keyword') }}@endif" >
        <label for="form_control_1">Nhập từ khóa...</label>
        <i class="icon-user"></i>
    </div>
</div>
<div class="form-actions noborder">
    <button type="submit" class="btn blue">Tìm kiếm</button>
    <button type="reset" class="btn default">Xóa</button>
</div>
