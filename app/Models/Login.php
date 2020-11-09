<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Login extends \Illuminate\Foundation\Auth\User implements JWTSubject,\Illuminate\Contracts\Auth\Authenticatable
{
    use Notifiable;

    public $table = 'login';

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
     * 创建用户
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
     * 根据用户id获取用户信息
     * @param $UserId
     * @param array $array
     * @return mixed
     * @throws Exception
     */
    public static function getUserInfo($UserId, $array = [])
    {
        try {
            return $array == null ?
                self::where('useid', $UserId)->get() :
                self::where('useid', $UserId)->get($array);
        } catch (\Exception $e) {
            logError('用户获取失败',[$e->getMessage()]);
            return null;

        }
    }


}
