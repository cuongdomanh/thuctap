<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"></div>
            </li>
            <li class="sidebar-search-wrapper">
                <form class="sidebar-search  " action="" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm..." style="color: yellow">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <?php $currentPath = Route::getCurrentRoute()->getName(); ?>

            <li class="nav-item start ">
                <a href="admin" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Trang chủ</span>
                </a>
            </li>
            <li class="heading">
                <h3 class="uppercase">Chức năng</h3>
            </li>

            <li class="nav-item  ">
                <a href="#" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-align-justify"></i>
                    <span class="title">Quản lý sản phẩm</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    @foreach(Module::product() as $bk)
                        <li class="nav-item">
                            <a href="{{ $bk['url'] }}" class="nav-link ">
                                <i class="{{ $bk['icon'] }}"></i>
                                <span class="title1">{{ $bk['title'] }}</span>
                                @if(starts_with($currentPath, 'admin.'.$bk['slug'])) <span
                                        class="selected"></span> @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="#" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-bullhorn"></i>
                    <span class="title">Quản lý tin tức </span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    @foreach(Module::news() as $bk)
                        <li class="nav-item">
                            <a href="{{ $bk['url'] }}" class="nav-link ">
                                <i class="{{ $bk['icon'] }}"></i>
                                <span class="title1">{{ $bk['title'] }}</span>
                                @if(starts_with($currentPath, 'admin.'.$bk['slug'])) <span
                                        class="selected"></span> @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="#" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-user"></i>
                    <span class="title">Quản lý người dùng</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    @foreach(Module::user() as $us)
                        <li class="nav-item">
                            <a href="{{ $us['url'] }}" class="nav-link ">
                                <i class="{{ $us['icon'] }}"></i>
                                <span class="title1">{{ $us['title'] }}</span>
                                @if(starts_with($currentPath, 'admin.'.$us['slug'])) <span
                                        class="selected"></span> @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="#" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-earphone"></i>
                    <span class="title">Quản lý thanh toán</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    @foreach(Module::order() as $od)
                        <li class="nav-item">
                            <a href="{{ $od['url'] }}" class="nav-link ">
                                <i class="{{ $od['icon'] }}"></i>
                                <span class="title1">{{ $od['title'] }}</span>
                                @if(starts_with($currentPath, 'admin.'.$od['slug'])) <span
                                        class="selected"></span> @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="#" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-envelope"></i>
                    <span class="title">Quản lý hộp thư</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    @foreach(Module::contact() as $ct)
                        <li class="nav-item">
                            <a href="{{ $ct['url'] }}" class="nav-link ">
                                <i class="{{ $ct['icon'] }}"></i>
                                <span class="title1">{{ $ct['title'] }}</span>
                                @if(starts_with($currentPath, 'admin.'.$ct['slug'])) <span
                                        class="selected"></span> @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="#" class="nav-link nav-toggle">
                    <i class="glyphicon glyphicon-pause"></i>
                    <span class="title">Quản lý nội dung</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    @foreach(Module::content() as $ct)
                        <li class="nav-item">
                            <a href="{{ $ct['url'] }}" class="nav-link ">
                                <i class="{{ $ct['icon'] }}"></i>
                                <span class="title1">{{ $ct['title'] }}</span>
                                @if(starts_with($currentPath, 'admin.'.$ct['slug'])) <span
                                        class="selected"></span> @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
