@extends('layouts.admin')

@section('title') Nội thất 3D đẹp @endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/user') }}">Người dùng</a></li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Người dùng
        <small>Quản lý</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            @include('partials.admin.alert')
            @if(empty($testMember))
                {{--@permission('user-create')--}}
                <div class="clearfix">
                    <a href="{{ url('admin/user/create') }}" class="btn green"> Thêm mới <i class="fa fa-plus"></i></a>
                </div>
                {{--@endpermission--}}
            @endif
            {!! Form::open(['method' => 'GET', 'url' => 'admin/user']) !!}
            @include('partials.admin.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:;" class="reload"> </a>
                        <a href="javascript:;" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                        <tr>
                            <th> #</th>
                            <th> Họ tên</th>
                            <th> Email</th>
                            <th> Quyền</th>
                            <th> Kích hoạt</th>
                            <th> Ngày tạo</th>
                            <th width="160"> Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->email }} </td>
                                <td>
                                    @foreach($item->roles as $item2)
                                        {{$item2->name}}
                                    @endforeach
                                </td>
                                <td>
                                    @if($item->is_activated == 1)
                                        Đã kích hoạt
                                    @else
                                        <span style="color: red;">Chưa kích hoạt</span>
                                    @endif
                                </td>
                                <td> {{ (!empty($item->created_at))?$item->created_at->format('d-m-Y'):'Chưa cập nhật' }} </td>
                                <td>
                                    {{--@permission('user-delete')--}}
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['admin/user', $item->id]]) !!}
                                    @if($item->username != 'administrator')
                                        <button type="submit" class="btn btn-sm btn-outline red pull-right"
                                                onclick="return confirm('Bạn chắc chắn muốn xóa ?');">
                                            <i class="fa fa-remove"></i> Xóa
                                        </button>
                                    @endif
                                    {!! Form::close() !!}
                                    {{--@endpermission--}}
                                    @if(empty($testMember))
                                        {{--@permission('user-edit')--}}
                                        <a href="{{ url('admin/user/' . $item->id . '/edit') }}"
                                           class="btn btn-sm btn-outline dark pull-right">
                                            <i class="fa fa-edit"></i> Sửa
                                        </a>
                                        {{--@endpermission--}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('partials.admin.pagination')
@endsection


