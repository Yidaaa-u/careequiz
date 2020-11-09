<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temperament extends Model
{
    protected $table = "temperament";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 气质测试回显测试状态回显
     * @param $useid
     * @return string|null
     */
    public static function lzz_temperamentInfo($useid)
    {

        try {
            $data = Temperament::where('id',$useid)
                    ->exists();
            if($data == null){
                $data = "未测试";
            }else{
                $data ="已测试";
            }
            return $data;
        } catch(\Exception $e){
            logError('气质测试回显测试状态回显错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     *气质测试后台回显详情
     * @return |null
     */
    public static function lzz_temperamentBack()
    {
        try {
            $data = Temperament::join('userinfo as uo','uo.id','temperament.id')
                                 ->select('temperament.id','uo.name'
                                     ,'temperament.a','temperament.b','temperament.c','temperament.d')
                                 ->get();
            return $data;
        } catch(\Exception $e){
            logError('气质测试后台回显详情错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 气质测试查询
     * @param $name
     * @return |null
     */
    public static function lzz_temperamentSelect($name)
    {
        try {
            if($name == null){
                $data = Temperament::join('userinfo as uo','uo.id','temperament.id')
                    ->select('temperament.id','uo.name'
                        ,'temperament.a','temperament.b','temperament.c','temperament.d')
                    ->get();
                return $data;
            }else{
                $data = Temperament::join('userinfo as uo','uo.id','temperament.id')
                    ->select('temperament.id','uo.name'
                        ,'temperament.a','temperament.b','temperament.c','temperament.d')
                    ->where('uo.name',$name)
                    ->get();
            }
            return $data;
        } catch(\Exception $e){
            logError('气质测试后台回显详情错误',[$e->getMessage()]);
            return null;
        }
    }
}
