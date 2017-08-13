@extends('layouts.admin')

@section('title') Nội thất 3D đẹp @endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li>
            <a href="{{ url('admin/slide') }}">Slide</a>
        </li>
    </ul>
@endsection

@section('content')
    <h3 class="page-title">Slide
        <small>Quản lý</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            @include('partials.admin.alert')
            {{--@permission('book-create')--}}

            <div class="clearfix">
                <a href="{{ url('admin/slide/create') }}" class="btn green"> Tạo mới slide <i
                            class="fa fa-plus"></i></a>
            </div>
            {{--@endpermission--}}
            {!! Form::open(['method' => 'GET', 'url' => 'admin/slide']) !!}
            @include('partials.admin.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách slide</div>
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
                            <th> Ảnh</th>
                            <th> Nội dung</th>
                            <th> Link</th>
                            <th> Vị trí</th>
                            <th> Kích hoạt</th>
                            <th width="220"> Hoạt động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $item->title }} </td>
                                <td>
                                    <img src="{{$item->image}}" alt="" WIDTH="100"/>
                                </td>
                                <td> {!!$item->description!!} </td>
                                <td> {{ $item->link }}</td>
                                <td>
                                    @if($item->type == 0)
                                        {{'Banner'}}
                                    @elseif($item->type == 1)
                                        {{'Quảng cáo trái'}}
                                    @else
                                        {{'Quảng cáo phải'}}
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 1) <input type="checkbox" name="status[]"
                                                                   value="{{ $item->id }}" checked="checked"
                                                                   disabled="disabled"/> @endif
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['admin/slide', $item->id]]) !!}
                                    <button type="submit" class="btn btn-sm btn-outline red pull-right"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa ?');">
                                        <i class="fa fa-remove"></i> Xóa
                                    </button>
                                    {!! Form::close() !!}
                                    <a href="{{ url('admin/slide/' . $item->id . '/edit') }}"
                                       class="btn btn-sm btn-outline dark pull-right">
                                        <i class="fa fa-edit"></i> Sửa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('partials.admin.pagination')
@endsection


