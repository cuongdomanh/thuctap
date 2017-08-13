@extends('layouts.admin')

@section('title') Nội thất 3D đẹp @endsection

@section('breadcrumb')
    <ul class="page-breadcrumb">
        <li><a href="{{ url('admin') }}">Trang chủ</a><i class="fa fa-circle"></i></li>
        <li>
            <a href="{{ url('admin/product') }}">Sản phẩm</a>
        </li>
    </ul>
@endsection
@section('js')
    <script type="text/javascript" src="{{ url('admin_js/controller.js') }}"></script>
@endsection

@section('content')
    <div id="detailModal" class="modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                </div>
                <div class="modal-body">
                    {{--KHU VUC TRUYEN AJAX--}}
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                </div>
            </div>
        </div>
    </div>
    <h3 class="page-title">Sản phẩm
        <small>Quản lý</small>
    </h3>
    <div class="row">
        <div class="col-md-12">
            @include('partials.admin.alert')
            {{--@permission('book-create')--}}
            <div class="clearfix">
                <a href="{{ url('admin/product/create') }}" class="btn green"> Tạo mới sản phẩm <i
                            class="fa fa-plus"></i></a>
            </div>
            {{--@endpermission--}}
            {!! Form::open(['method' => 'GET', 'url' => 'admin/product']) !!}
            @include('partials.admin.search_form')
            {!! Form::close() !!}

            <div class="portlet box green margin-top-10">
                <div class="portlet-title">
                    <div class="caption"><i class="fa fa-cogs"></i>Danh sách sản phẩm</div>
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
                            <th> Ảnh bìa</th>
                            <th> Giá (VNĐ)</th>
                            <th> Số lượng</th>
                            <th> Giảm giá</th>
                            <th> Tình trạng</th>
                            <th width="220"> Hoạt động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> {{ $item->title }} </td>
                                <td>
                                    <img src="{{url('')}}/{{$item->thumbnail}}" alt="" WIDTH="100"/>
                                </td>
                                <td> {{ $item->price }}</td>
                                <td> {{( $item->quantity>0)? $item->quantity:"hết hàng" }} </td>
                                <td> {{ $item->discount }}</td>
                                <td>
                                    @if($item->status == 1) <input type="checkbox" name="status[]" value="{{ $item->status }}" checked="checked" disabled="disabled" /> @endif
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE', 'url' => ['admin/product', $item->id]]) !!}
                                    {{--@permission('book-delete')--}}
                                    <button type="submit" class="btn btn-sm btn-outline red pull-right"
                                            onclick="return confirm('Bạn chắc chắn muốn xóa ?');">
                                        <i class="fa fa-remove"></i> Xóa
                                    </button>
                                    {{--@endpermission--}}

                                    {!! Form::close() !!}
                                    {{--@permission('book-edit')--}}
                                    <a href="{{ url('admin/product/' . $item->id . '/edit') }}"
                                       class="btn btn-sm btn-outline dark pull-right">
                                        <i class="fa fa-edit"></i> Sửa
                                    </a>
                                    {{--@endpermission--}}
                                    <a href="javascript:void(0);" onclick="showDetail('admin/product/{{$item->id }}')"
                                       class="btn btn-sm btn-outline dark pull-right">
                                        <i class="fa fa-eye"></i>Xem
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


