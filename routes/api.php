<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('auth')->namespace('Admin')->group(function () {
    Route::post('login', 'AuthController@login'); //登陆
    Route::post('logout', 'AuthController@logout'); //退出登陆
    Route::post('refresh', 'AuthController@refresh'); //刷新token
    Route::post("regist",'AuthController@registered');//注册
});//--lzz
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::post('login', 'AdminController@login'); //管理员登陆
    Route::post('logout', 'AdminController@logout'); //退出登陆
    Route::post('refresh', 'AdminController@refresh'); //刷新token
    Route::post("regist",'AdminController@registered');//注册
});//--lzz
Route::prefix('person')->namespace('Person')->group(function () {

    Route::get('test','PersonController@test');
});//--lzz
