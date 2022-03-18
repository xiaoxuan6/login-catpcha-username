<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
use Encore\CaptchaUser\Http\Controllers\{CaptchaUserController, UserController};

Route::get('auth/login', CaptchaUserController::class . '@login');
Route::post('auth/login', CaptchaUserController::class . '@postLogin');
Route::resource('auth/users', UserController::class);
