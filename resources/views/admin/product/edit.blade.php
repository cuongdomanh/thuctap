@extends('layouts.admin')

@section('title') Nội thất 3D đẹp @endsection

@section('css')
    @include('partials.admin.css_of_form')
@endsection

@section('js')
    @include('partials.admin.js_of_form')
@endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/product') }}">Sản phẩm</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/product/'.$product->id. '/edit') }}">Chỉnh sửa</a></li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Sản phẩm "<b>{{ $product->title }}</b>"
        <small> Chỉnh sửa</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    {!! Form::model($product, ['method' => 'PATCH', 'url' => ['admin/product', $product->id],'files' => true, 'id' => 'form_sample_3', 'class' => 'form-horizontal']) !!}
                    @include('admin.product.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


