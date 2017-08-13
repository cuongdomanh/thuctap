@extends('layouts.admin')

@section('title')
    Quản lý bài viết
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
        <li><a href="{{ url('admin/news') }}">Bài viết</a><i class="fa fa-circle"></i></li>
        <li><a href="{{ url('admin/news/create') }}">Tạo mới</a></li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Tạo mới</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'url' => 'admin/news', 'files'  => true, 'id' => 'form_sample_3', 'class' => 'form-horizontal']) !!}
                    @include('admin.news.form')
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection