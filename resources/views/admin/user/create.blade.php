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
        <li>
            <a href="{{ url('admin/user') }}">Người dùng</a><i class="fa fa-circle"></i>
        </li>
        <li><a href="{{ url('admin/user/create')}}">Thêm mới</a></li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Người dùng
        <small>&nbsp;Tạo mới</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/user', 'id' => 'form_sample_3', 'files'=>true, 'class' => 'form-horizontal']) !!}
                        @include('admin.user.form')
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
@endsection


