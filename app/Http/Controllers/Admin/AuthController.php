<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\AuthRequest;
use App\Models\Admin;
use App\Models\Login;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * 登录
     * @param Request $loginRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $loginRequest)
    {
        try {
            $credentials = self::credentials($loginRequest);
            if (!$token = auth('user')->attempt($credentials)) {
                return json_fail(100, '账号或者用户名错误!', null);
            }
            if(auth('user')->user()->auth_code == 1){
                return self::respondWithToken($token, '登陆成功!');
            }else{
                AdminController::lgout();
                return json_fail(500, '登陆失败!', null, 500);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            return json_fail(500, '登陆失败!', null, 500);
        }
    }

    /**
     * 注销登录
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        try {
            auth('user')->logout();
        } catch (\Exception $e) {

        }
        return auth('user')->check() ?
            json_fail('注销登陆失败!',null, 100 ) :
            json_success('注销登陆成功!',null,  200);
    }

    /**
     * 刷新token
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        try {
            $newToken = auth('user')->refresh();
        } catch (\Exception $e) {
        }
        return $newToken != null ?
            self::respondWithToken($newToken, '刷新成功!') :
            json_fail(100, null,'刷新token失败!');
    }

    protected function credentials($request)
    {
        return ['phone' => $request['phone'], 'password' => $request['password']];
    }

    protected function respondWithToken($token, $msg)
    {
        return json_success( $msg, array(
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('user')->factory()->getTTL() * 60
        ),200);
    }


    /**
     * 注册
     * @param Request $registeredRequest
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function registered(AdminRequest $registeredRequest)
    {
        return Admin::createUser(self::userHandle($registeredRequest)) ?
            json_success('注册成功!',null,200  ) :
            json_success('注册失败!',null,100  ) ;

    }
    protected function userHandle($request)
    {
        $registeredInfo = $request->except('password_confirmation');
        $registeredInfo['password'] = bcrypt($registeredInfo['password']);
        $registeredInfo['phone'] = $registeredInfo['phone'];
        $registeredInfo['auth_code'] = 1;
        return $registeredInfo;
    }


}
