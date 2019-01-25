<?php

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
            __DIR__.'/../resources/lang/en/admin.php' => resource_path('lang/en/admin.php'),
            __DIR__.'/../resources/lang/zh-CN/admin.php' => resource_path('lang/zh-CN/admin.php'),
            __DIR__.'/../resources/lang/zh-CN/validation.php' => resource_path('lang/zh-CN/validation.php'),
        ], 'lang');

        $this->app->booted(function () {
            CaptchaUser::routes(__DIR__.'/../routes/web.php');
        });
    }
}