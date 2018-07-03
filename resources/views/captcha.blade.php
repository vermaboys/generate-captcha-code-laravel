@extends('layouts.app')

@section('content')

<link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
<div class="container" style="background: rgba(95, 77, 20, 0.57)">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/captcha') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Captcha</label>

                            <div class="col-md-6">
                                {!! captcha_image_html('ContactCaptcha') !!}
                                <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:5px;">

                                @if ($errors->has('CaptchaCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('CaptchaCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                 Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection