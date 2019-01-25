<?php

use Encore\CaptchaUser\Http\Controllers\CaptchaUserController;
use Encore\CaptchaUser\Http\Controllers\UserController;

Route::get('auth/login', CaptchaUserController::class.'@login');
Route::post('auth/login', CaptchaUserController::class.'@postLogin');
Route::resource('auth/users', UserController::class);