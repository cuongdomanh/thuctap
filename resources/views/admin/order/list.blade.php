@extends('layouts.admin')

@section('title')
    Quản lý hóa đơn
@endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li>
            <a href="{{ url('admin/order') }}">Hóa đơn</a>
        </li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Hóa đơn
        <small></small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            @include('partials.admin.alert')
            {{--@endpermission--}}
            {!! Form::open(['method' => 'GET', 'url' => 'admin/order']) !!}
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
                            <th> Địa chỉ</th>
                            <th> Số điện thoại</th>
                            <th> Tổng tiền(VND)</th>
                            <th> Ghi chú</th>
                            <th> Trạng thái</th>
                            <th width="160"> Hoạt động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td> {{ $key + $list->firstItem() }} </td>
                                <td> {{ $item->name }} </td>
                                <td> {{ $item->address }}</td>
                                <td> {{ $item->phone }}</td>
                                <td> {{ number_format($item->total_amount) }}</td>
                                <td> {{ $item->note }}</td>
                                <td>
                                    @if($item->status == 0)
                                        {{ 'Chờ xác nhận' }}
                                    @elseif($item->status == 1)
                                        {{ 'Chờ giao hàng' }}
                                    @elseif($item->status == 2)
                                        {{ 'Đã mua' }}
                                    @elseif($item->status == 3)
                                        {{ 'Đã hủy' }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/order/' . $item->id . '/edit') }}"
                                       class="btn btn-sm btn-outline dark pull-right">
                                        <i class="fa fa-edit"></i> Sửa
                                    </a>
                                    {{--@permission('category-edit')--}}
                                    <a href="{{ url('admin/order/' . $item->id ) }}"
                                       class="btn btn-sm btn-outline dark pull-right">
                                        <i class="fa fa-eye"></i> Xem
                                    </a>
                                    {{--@endpermission--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @include('partials.admin.pagination')
            </div>
        </div>
    </div>
@endsection