<div class="portlet-body">
    @if(Session::has('success'))
        <div class="alert alert-block alert-success fade in">
            <button type="button" class="close" data-dismiss="alert"></button>
            <p> {{ Session::get('success') }}</p>
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-block alert-danger fade in">
            <button type="button" class="close" data-dismiss="alert"></button>
            <p> {{ Session::get('error') }}</p>
        </div>
    @endif
    @if(Session::has('warning'))
        <div class="alert alert-block alert-warning fade in">
            <button type="button" class="close" data-dismiss="alert"></button>
            <p> {{ Session::get('warning') }}</p>
        </div>
    @endif
    @if(Session::has('info'))
        <div class="alert alert-block alert-info fade in">
            <button type="button" class="close" data-dismiss="alert"></button>
            <p> {{ Session::get('info') }}</p>
        </div>
    @endif
    {{--@if(isset($errors) && count($errors) > 0)--}}
        {{--<div class="alert alert-block alert-danger fade in">--}}
            {{--<button type="button" class="close" data-dismiss="alert"></button>--}}
            {{--<h4 class="alert-heading">You have some form errors. Please check below.</h4>--}}
            {{--@foreach($errors->all() as $error)--}}
                {{--<p> {{ $error }}</p>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--@endif--}}
</div>
