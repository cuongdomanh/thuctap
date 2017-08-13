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
        <li><a href="{{ url('admin/user') }}">Người dùng</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/user/'.$user->id.'/edit') }}">Chỉnh sửa</a></li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Người dùng "<b>{{ $user->title }}</b>"
        <small> Chỉnh sửa</small>
    </h3>

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    {!! Form::model($user, ['method' => 'PATCH', 'url' => ['admin/user', $user->id], 'id' => 'form_sample_3', 'class' => 'form-horizontal','files'=>true]) !!}
                        @include('admin.user.form')
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
@endsection



