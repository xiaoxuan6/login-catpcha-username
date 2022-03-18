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

use Illuminate\Support\ServiceProvider;

class CaptchaUserServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(CaptchaUser $extension)
    {
        if (! CaptchaUser::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'login-captcha-username');
        }

        if ($migrations = $extension->migrations()) {
            $this->loadMigrationsFrom($migrations);
        }

        $this->publishes([
            __DIR__ . '/../resources/lang/en/admin.php' => resource_path('lang/en/admin.php'),
            __DIR__ . '/../resources/lang/zh-CN/admin.php' => resource_path('lang/zh-CN/admin.php'),
            __DIR__ . '/../resources/lang/zh-CN/validation.php' => resource_path('lang/zh-CN/validation.php'),
            __DIR__ . '/../resources/lang/zh-CN/auth.php' => resource_path('lang/zh-CN/auth.php'),
        ], 'lang');

        $this->app->booted(function () {
            CaptchaUser::routes(__DIR__ . '/../routes/web.php');
        });
    }
}
