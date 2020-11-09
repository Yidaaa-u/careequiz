<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends \Illuminate\Foundation\Auth\User implements JWTSubject,\Illuminate\Contracts\Auth\Authenticatable
{
    use Notifiable;

    public $table = 'admin';

    protected $rememberTokenName = NULL;

    protected $primaryKey = 'useid';

    protected $guarded = [];

    protected $hidden = [
        'password',
    ];

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getJWTIdentifier()
    {
        return self::getKey();
    }


    /**
     * 创建管理员
     *
     * @param array $array
     * @return |null
     * @throws \Exception
     */
    public static function createUser($array = [])
    {
        try {
            return self::create($array) ?
                true :
                false;
        } catch (\Exception $e) {
            logError('创建用户失败',[$e->getMessage()]);
            return null;
        }
    }


    /**
     * 根据管理员用户id获取用户信息
     * @param $UserId
     * @param array $array
     * @return mixed
     * @throws \Exception
     */
    public static function getUserInfo($UserId, $array = [])
    {
        try {
            return $array == null ?
                self::where('id', $UserId)->get() :
                self::where('id', $UserId)->get($array);
        } catch (\Exception $e) {
            logError('用户获取失败',[$e->getMessage()]);
            return null;

        }
    }

    /**
     * 期末教学记录检查表页面查看
     * @author caiwenpin <github.com/codercwp>
     * @return data
     */
    public static function cwp_all(){
        try {
            $data['allNumber '] =  self::where('auth_code',1)->count();
            return $data;
        } catch (\Exception $e) {
            logError('用户获取失败',[$e->getMessage()]);
            return null;
        }
    }



}
