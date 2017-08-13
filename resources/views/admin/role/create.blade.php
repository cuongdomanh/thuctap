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
        <li><a href="{{ url('admin/role') }}">Phân quyền</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/role/create')}}">Thêm mới</a></li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Phân quyền
        <small>&nbsp;Tạo mới</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/role', 'id' => 'form_sample_3', 'class' => 'form-horizontal']) !!}
                        @include('admin.role.form')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


