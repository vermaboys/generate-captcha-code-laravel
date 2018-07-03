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
