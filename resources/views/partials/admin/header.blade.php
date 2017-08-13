<!-- BEGIN HEADER INNER -->
<div class="page-header-inner ">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
        <a href="{{'admin'}}">
            <img src="{{ asset('assets/layouts/layout/img/logo-2.png') }}" alt="logo" class="logo-default"/> </a>
        <div class="menu-toggler sidebar-toggler"></div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
       data-target=".navbar-collapse"> </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
        <ul class="nav navbar-nav pull-right">

            <li class="dropdown dropdown-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    @if(isset(Auth::user()->thumbnail))
                        <img ickalt="" class="img-circle" src="{{ url(Auth::user()->thumbnail) }}"/>
                    @endif
                    <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                </a>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
            <li class="dropdown">
                <a href="{{url('logout')}}" class="dropdown-toggle">
                    <i class="icon-logout"></i>
                </a>
            </li>
            <!-- END QUICK SIDEBAR TOGGLER -->
        </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
</div>
<!-- END HEADER INNER -->
