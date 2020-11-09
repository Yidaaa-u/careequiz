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


/**
 * @author Dujingwen <github.com/DJWKK>
 */
Route::prefix('test')->namespace('Test')->group(function(){
    Route::post('pdpsubmit','PdpController@phpSubmit');//获取PDP各项分数
    Route::get('pdpshow','PdpController@pdpShow');//PDP测试分数展示
});
/**
 * @author Dujingwen <github.com/DJWKK>
 */
Route::prefix('person')->namespace('Person')->group(function(){
    Route::get('userdetails','UserController@userDetails');//获取用户信息
    Route::post('usersearch','UserController@userSearch');//查找某个用户信息
});


Route::prefix('test')->namespace('Test')->group(function () {
    Route::post('addholland', 'HollandController@addHolland'); //添加霍兰德测试
    Route::get('resholland', 'HollandController@resHolland'); //返回霍兰德测试结果
    Route::get('jobholland', 'HollandController@jobHolland'); //霍兰德测试结果对应工作
});//--cwp

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::get('allnum', 'HomeController@allNum'); //已注册人数
    Route::get('temnum', 'HomeController@temNum'); //参加过性格测试人数
    Route::get('pdpnum', 'HomeController@pdpNum'); //参加过pdp测试人数
    Route::get('hollandnum', 'HomeController@hollandNum'); //参加过holland测试的人数
    Route::get('temaverage', 'HomeController@temAverage'); //性格测试平均分
    Route::get('pdpaverage', 'HomeController@pdpAverage'); //pdp测试平均分
    Route::get('hollandaverage', 'HomeController@hollandAverage');//Holland测试平均分
});//--cwp

