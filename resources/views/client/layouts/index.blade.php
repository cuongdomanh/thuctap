<!DOCTYPE HTML>
<html lang="en-US">
<head>

    @include('client.partials.metadata')

</head>
<body>

@include('client.partials.full_screen')

@include('client.partials.search')

@include('client.partials.nav')

<!-- Loader -->
{{--<div id="page-preloader"><span class="spinner"></span></div>--}}
<!-- Loader end -->
<div class="b-page" canvas="container">
    @include('client.partials.switch')

    @include('client.partials.header')

    <section class="section-home home-1">

        @yield('content')

    </section>
    @include('client.partials.livechat')
    @include('client.partials.footer')
</div>

@include('client.partials.js_lib')

</body>
</html>
