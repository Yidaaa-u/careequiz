<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

开发文档
1. 配置 .env
2.运行：
composer update
php artisan jwt:secret
3.获取用户和管理员登陆表的信息
$phone = auth('user')->user()->phone;
