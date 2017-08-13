@extends('layouts.admin')

@section('title') Nội thất 3D đẹp @endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li>
            <a href="{{ url('admin/contact') }}">Hộp thư</a>
        </li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Hộp thư
        <small>Quản lý</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            @include('partials.admin.alert')
            {!! Form::open(['method' => 'GET', 'url' => 'admin/contact']) !!}
            @include('partials.admin.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách </div>
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
                            <th> Tên</th>
                            <th> SĐT</th>
                            <th> Email</th>
                            <th> Địa chỉ</th>
                            <th> Tiêu đề</th>
                            <th> Nội dung</th>
                            <th> Trạng thái</th>
                            <th width="160"> Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->phone }} </td>
                                <td> {{ $item->email }} </td>
                                <td> {{ $item->address }} </td>
                                <td> {{ $item->title }} </td>
                                <td> {{ $item->message }} </td>
                                <td>
                                    @if($item->status==0)
                                        <span class="text-danger">Chưa xem</span>
                                    @else
                                        <span class="text-primary">Đã xem</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/contact/' . $item->id . '/edit') }}"
                                       class="btn btn-sm btn-outline dark pull-right">
                                        <i class="fa fa-edit"></i> Cập nhật trạng thái
                                    </a>
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



