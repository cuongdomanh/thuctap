@extends('layouts.admin')

@section('title') Quản lý loại danh mục @endsection

@section('css')
    @include('partials.admin.css_of_form')
@endsection

@section('js')
    @include('partials.admin.js_of_form')
@endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/category') }}">Danh mục</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/category/'. $cate->id .'/create') }}">Chỉnh sửa</a></li>

    </ul>
@endsection

@section('content')
    <h3 class="page-title">Cập nhật
        {{--<small>&nbsp;Quản lý thể loại</small>--}}
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                {!! Form::model($cate, ['method' => 'PATCH', 'url' => ['admin/category', $cate->id],'files' => true, 'id' => 'form_sample_3', 'class' => 'form-horizontal']) !!}
                @include('admin.category.form')
                {!! Form::close() !!}
                <!-- END FORM-->
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>
    </div>
@endsection