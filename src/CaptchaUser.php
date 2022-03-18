<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Encore\CaptchaUser;

use Encore\Admin\Extension;

class CaptchaUser extends Extension
{
    public $name = 'login-captcha-username';

    public $views = __DIR__ . '/../resources/views';

    public $migrations = __DIR__ . '/../database/migrations';
}
