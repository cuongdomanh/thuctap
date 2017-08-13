@extends('layouts.admin')

@section('title')
    Chi tiết hóa đơn
@endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li>
            <a href="{{ url('admin/order') }}">Hóa đơn</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <p>Chi tiết hóa đơn</p>
        </li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Chi tiết hóa đơn
        <small></small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            @include('partials.admin.alert')
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
                            <th> Sản phẩm</th>
                            <th> Số lượng</th>
                            <th> Đơn giá</th>
                            <th> Thành tiền(VND)</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $item->product->title }} </td>
                                <td> {{ $item->quantity }}</td>
                                <td> {{ number_format($item->price) }}</td>
                                <td> {{ number_format($item->amount) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection