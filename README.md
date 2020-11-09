<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

开发文档
1. 配置 .env
2.运行：
composer update
php artisan jwt:secret
3.获取用户登陆表的信息
$phone = auth('user')->user()->phone;
如果获取管理员的的Token在auth中添加user  用户添加 api,最后->的是登录表的字段
框架里面集成了方法。需要前端传输token，后端无需接收
