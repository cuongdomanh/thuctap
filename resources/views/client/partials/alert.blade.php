<div class="row">
    @if(Session::has('error'))
        <div class="b-alerts-dismissible col-sm-12 wow fadeInLeft">
            <div class="alert error-dismissible alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <span class="alert-dismissible-title">Thông báo</span>
                <br>
                <span class="alert-dismissible-description">
                {{ Session::get('error') }}
            </span>
            </div>
        </div>
    @endif
    @if(Session::has('success'))
        <div class="b-alerts-dismissible col-sm-12 wow fadeInLeft">
            <div class="alert success-dismissible alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <span class="alert-dismissible-title">Thông báo</span>
                <br>
                <span class="alert-dismissible-description">
                {{ Session::get('success') }}
            </span>
            </div>
        </div>
    @endif
    @if(Session::has('warning'))
        <div class="b-alerts-dismissible col-sm-12 wow fadeInLeft">
            <div class="alert warning-dismissible alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <span class="alert-dismissible-title">Thông báo</span>
                <br>
                <span class="alert-dismissible-description">
                {{ Session::get('warning') }}
            </span>
            </div>
        </div>
    @endif
    @if(Session::has('info'))
        <div class="b-alerts-dismissible col-sm-12 wow fadeInLeft">
            <div class="alert normal-dismissible alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <span class="alert-dismissible-title">Thông báo</span>
                <br>
                <span class="alert-dismissible-description">
                {{ Session::get('info') }}
                </span>
            </div>
        </div>
    @endif
    @if(isset($errors) && count($errors) > 0)
        <div class="b-alerts-dismissible col-sm-12 wow fadeInLeft">
            <div class="alert error-dismissible alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <span class="alert-dismissible-title">Thông báo</span>
                <br>
                <span class="alert-dismissible-description">
                    @foreach($errors->all() as $error)
                        <p> {{ $error }}</p>
                    @endforeach
                </span>
            </div>
        </div>
    @endif
</div>
