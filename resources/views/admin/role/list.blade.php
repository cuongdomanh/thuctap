@extends('layouts.admin')

@section('title') Nội thất 3D đẹp @endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/role') }}">Phân quyền</a></li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Phân quyền
        <small>Quản lý</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            @include('partials.admin.alert')
            {{--@permission('role-create')--}}
                <div class="clearfix">
                    <a href="{{ url('admin/role/create') }}" class="btn green"> Tạo mới phân quyền <i class="fa fa-plus"></i></a>
                </div>
            {{--@endpermission--}}
            {!! Form::open(['method' => 'GET', 'url' => 'admin/role']) !!}
                @include('partials.admin.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách phân quyền</div>
                    <div class="tools">
                        <a href="javascript:void(0);" class="collapse"> </a>
                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                        <a href="javascript:void(0);" class="reload"> </a>
                        <a href="javascript:void(0);" class="remove"> </a>
                    </div>
                </div>
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th> #</th>
                                <th> Tên</th>
                                <th> Mô tả</th>
                                <th> Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td> {{ $item->name }} </td>
                                    <td> {{ $item->description }} </td>
                                    <td>
                                        {{--@permission('role-delete')--}}
                                        {!! Form::open(['method' => 'DELETE', 'url' => ['admin/role', $item->id]]) !!}
                                            @if($item->username != 'administrator')
                                                <button type="submit" class="btn btn-sm btn-outline red pull-right" onclick="return confirm('Bạn chắc chắn muốn xóa ?');">
                                                    <i class="fa fa-remove"></i> Xóa
                                                </button>
                                            @endif
                                        {!! Form::close() !!}
                                        {{--@endpermission--}}
                                        {{--@permission('role-edit')--}}
                                            <a href="{{ url('admin/role/' . $item->id . '/edit') }}" class="btn btn-sm btn-outline dark pull-right">
                                                <i class="fa fa-edit"></i> Sửa
                                            </a>
                                        {{--@endpermission--}}
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




