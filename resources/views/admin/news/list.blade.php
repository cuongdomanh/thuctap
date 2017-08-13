@extends('layouts.admin')

@section('title')
    Quản lý bài viết
@endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li>
            <a href="{{ url('admin/news') }}">Bài viết</a>
        </li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Bài viết
        <small></small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            @include('partials.admin.alert')
            {{--@permission('category-create')--}}
            <div class="clearfix">
                <a href="{{ url('admin/news/create') }}" class="btn green"> Tạo mới <i
                            class="fa fa-plus"></i></a>
            </div>
            {{--@endpermission--}}
            {!! Form::open(['method' => 'GET', 'url' => 'admin/news']) !!}
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
                            <th> Tiêu đề</th>
                            <th> Thuộc danh mục</th>
                            <th> Thẻ</th>
                            <th> Ảnh đại diện </th>
                            <th> Kích hoạt</th>
                            <th width="160"> Hoạt động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td> {{ $key + $list->firstItem() }} </td>
                                <td> {{ $item->title }} </td>
                                <td>
                                    {{ $item->category['title'] }}
                                </td>
                                <td>
                                    @foreach($item->tag as $tag)
                                        {{ $tag->title }}
                                        <br>
                                    @endforeach
                                </td>
                                <td>
                                    <img src="{{ url('uploads/news/') }}/{{ $item->thumbnail }}" class="img-thumbnail" alt="" style="height: 100px; width: 100px;">
                                </td>
                                <td>
                                    @if($item->status==0)
                                        {{'Chưa kích hoạt'}}
                                    @else
                                        {{'Đã kích hoạt'}}
                                    @endif
                                </td>
                                <td>

                                    {!! Form::open(['method' => 'DELETE', 'url' => ['admin/news', $item->id]]) !!}
                                    {{--@permission('category-delete')--}}
                                    <button type="submit" class="btn btn-sm btn-outline red pull-right"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa?');">
                                        <i class="fa fa-remove"></i> Xóa
                                    </button>
                                    {{--@endpermission--}}

                                    {!! Form::close() !!}
                                    {{--@permission('category-edit')--}}
                                    <a href="{{ url('admin/news/' . $item->id . '/edit') }}"
                                       class="btn btn-sm btn-outline dark pull-right">
                                        <i class="fa fa-edit"></i> Sửa
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