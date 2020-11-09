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

    Route::get('temperamentback','BackstageController@temperamentBack');//气质测试后台回显详情
    Route::get('pdpback','BackstageController@pdpback');//PDP性格测试后台回显详情
    Route::get('hollandback','BackstageController@hollandBack');//霍兰德职业兴趣测后台回显详情

    Route::get('temperamentselect','SelectController@temperamentSelect');//气质测试查询
    Route::get('pdpselect','SelectController@pdpSelect');//PDP性格测试查询
    Route::get('hollandselect','SelectController@hollandSelect');//霍兰德职业兴趣查询
});//--lzz


Route::prefix('person')->namespace('Person')->group(function (){
    Route::post('addinfo','PersonController@addInfo');//用户信息添加
});//--lzz



Route::prefix('test')->namespace('Test')->group(function (){
    Route::get('temperamentinfo','TestController@temperamentInfo');//气质测试回显测试状态回显
    Route::get('pdpinfo','TestController@pdpInfo');//PDP性格测试测试状态回显
    Route::get('hollandinfo','TestController@hollandInfo');//霍兰德职业兴趣测试测试状态回显
});//--lzz

/**

 * @author ChenMiao <github.com//Yidaaa-u>
 */
Route::prefix('test')->namespace('Test')->group(function () {
    Route::post('temsubmit', 'TemController@temSubmit'); //气质测评确定提交
    Route::get('temshow', 'TemController@temShow'); //气质测试分数展示
});


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


