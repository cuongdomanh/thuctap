@extends('layouts.admin')

@section('title')
    Quản lý hóa đơn
@endsection

@section('css')
    @include('partials.admin.css_of_form')
@endsection

@section('js')
    @include('partials.admin.js_of_form')
@endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}"></a>Trang chủ<i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/order') }}">Hóa đơn</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/order/'. $order->id .'/edit') }}">Chỉnh sửa</a></li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Hóa đơn khách hàng "{{ $order->name }}"</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    {!! Form::model($order,['method' => 'PATCH', 'url' => ['admin/order', $order->id], 'files'  => true, 'id' => 'form_sample_3', 'class' => 'form-horizontal']) !!}
                       @include('admin.order.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection