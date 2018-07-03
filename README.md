# generate-captcha-code-laravel

## Clone Project
```
Step 1 :- Run command on terminal git clone https://github.com/vermaboys/generate-captcha-code-laravel.git
Step 2 :- composer install
Now you can access captcha using http://localhost/generate-captcha-code-laravel/captcha
```


## Step 1: Installation

```
In first step we will install captcha-com/laravel-captcha package for generate captcha code image. this package through we can generate generate captcha code image for our project. so first fire bellow command in your cmd or terminal:

composer require captcha-com/laravel-captcha:"4.*"

Now we need to add provider path and alias path in config/app.php file so open that file and add bellow code.

config/app.php

return [
	......
	$provides => [
		......
		......,
		LaravelCaptcha\Providers\LaravelCaptchaServiceProvider::class
	],
	.....
]
Now we will run bellow command that way it will generate app/captcha.php file for configration and we can change and customize easily.

php artisan vendor:publish
```

Step 2: Add Route

```
In second step we will add new two route for creating small example that way we can undestand very well. so first add bellow route in your routes.php file.

app/Http/routes.php

Route::get('captcha', 'CaptchaController@getCaptcha');
Route::post('captcha', 'CaptchaController@validCaptcha');
```

Step 3: Add Controller Method

```
In this step we will add getCaptcha() and validCaptcha() method in CaptchaController Controller file for our example. If you want to copy whole controller file then also you can just copy and paste.

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function getCaptcha()
    {
    	return view('captcha');
    }
    public function validCaptcha(Request $request)
    {
        $this->validate($request, [
            'CaptchaCode' => 'required|valid_captcha'
        ]);
        print('write your other code here.');
    }
}
```

Step 4: Add Blade file
```
This is a last step and you have to just create new blade file captcha.blade.php and put bellow code on that file.
resources/views/captcha.blade.php

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
```

Now you can access captcha using http://localhost/generate-captcha-code-laravel/captcha
