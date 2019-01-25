laravel-admin login-captch
======
Installation

First, install dependencies:

    composer require james.xue/login-captcha-username
 
Second :
    
    php artisan vendor:publish --tag=lang
    
Third :

    php artisan migrate
    
Fourth ：
    
   a、resources/en/admin.php  add

    'enabled'               => 'Status',
    
   b、resources/zh-CN/admin.php  add
   
    'enabled'               => '状态',

Configuration
 In the extensions section of the config/admin.php file, add some configuration that belongs to this extension.
 
     'extensions' => [
         'login-captcha-username' => [
             // set to false if you want to disable this extension
             'enable' => true,
         ]
     ]
 
 