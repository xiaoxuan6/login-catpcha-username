<?php

namespace Encore\CaptchaUser\Http\Controllers;

use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CaptchaUserController extends Controller
{
    public function login()
    {
        return view('login-captcha-username::index');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|exists:admin_users,username,enabled,1',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            admin_toastr(trans('admin.login_successful'));

            return redirect()->intended(config('admin.route.prefix'));
        }

        return Redirect::back()->withInput()->withErrors(['username' => $this->getFailedLoginMessage()]);
    }

    /**
     * @return string|\Symfony\Component\Translation\TranslatorInterface
     */
    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
            ? trans('auth.failed')
            : 'These credentials do not match our records.';
    }
}