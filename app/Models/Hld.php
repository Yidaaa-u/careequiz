<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hld extends Model
{

    protected $table = "hld";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 霍兰德职业兴趣测试测试状态回显
     * @param $useid
     * @return string|null
     */
    public static function lzz_hollandInfo($useid)
    {

        try {

            $data = self::where('id',$useid)
                ->exists();
            if($data == null){
                $data = "未测试";
            }else{
                $data ="已测试";
            }
            return $data;
        } catch(\Exception $e){
            logError('霍兰德职业兴趣测试测试状态回显错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 霍兰德职业兴趣测后台回显详情
     * @return |null
     */
    public static function lzz_hollandBack()
    {

        try {
            $data = Hld::join('userinfo as uo','uo.id','hld.id')
                ->select('hld.id','uo.name','hld.first','hld.second','hld.third')
                ->get();
            return $data;
        } catch(\Exception $e){
            logError('霍兰德职业兴趣测后台回显详情错误',[$e->getMessage()]);
            return null;
        }

    }

    /**
     * 霍兰德职业兴趣查询
     * @param $name
     * @return |null
     */
    public static function lzz_hollandSelect($name)
    {
        try {
            if($name == null){
                $data = Hld::join('userinfo as uo','uo.id','hld.id')
                    ->select('hld.id','uo.name','hld.first','hld.second','hld.third')
                    ->get();
                return $data;
            }else{
                $data = Hld::join('userinfo as uo','uo.id','hld.id')
                    ->select('hld.id','uo.name','hld.first','hld.second','hld.third')
                    ->where('uo.name',$name)
                    ->get();
            }
            return $data;
        } catch(\Exception $e){
            logError('霍兰德职业兴趣查询错误',[$e->getMessage()]);
            return null;
        }

    }


}
