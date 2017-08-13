<div class="portlet light portlet-fit bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject font-dark sbold uppercase">Chi tiết</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="row">
            <div class="col-md-12">
                <table id="user" class="table table-bordered table-striped">
                    <tbody>
                    <tr>
                        <td style="width:15%"> Tiêu đề</td>
                        <td style="width:50%">
                            <p>{{$product->title}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%"> Giá</td>
                        <td style="width:50%">
                            <p>{{$product->price}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%"> Giảm giá</td>
                        <td style="width:50%">
                            <p>{{$product->discount}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%"> Nội dung</td>
                        <td style="width:50%">
                            <p>{!!$product->description !!}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%"> Ảnh bìa</td>
                        <td style="width:50%">
                            <img src="{{url($product->thumbnail)}}" alt="" WIDTH="100"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%"> Ảnh đính kèm</td>
                        <td style="width:50%">
                            @foreach($product->image as $img)
                                <img src="{{url($img->url)}}" alt="" WIDTH="100"/>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%"> Số lượng</td>
                        <td style="width:50%">
                            <p>{{$product->quantity}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%"> Thể loại</td>
                        <td style="width:50%">
                            <p>{{$product->category->title}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%"> Tình trạng</td>
                        <td style="width:50%">
                            <p>{{$product->status}}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



