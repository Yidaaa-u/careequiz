<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdp extends Model
{
    protected $table = "pdp";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * PDP性格测试测试状态回显
     * @param $useid
     * @return string|null
     */
    public static function lzz_pdpInfo($useid)
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
            logError('PDP性格测试测试状态回显错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * PDP性格测试后台回显详情
     * @return |null
     */
    public static function lzz_pdpBack()
    {
        try {
            $data = Pdp::join('userinfo as uo','uo.id','pdp.id')
                ->select('pdp.id','uo.name','pdp.tiger','pdp.peacock','pdp.koala','pdp.owl','pdp.chameleon')
                ->get();
            return $data;
        } catch(\Exception $e){
            logError('PDP性格测试后台回显详情错误',[$e->getMessage()]);
            return null;
        }

    }


    /**
     * PDP性格测试查询
     * @param $name
     * @return |null
     */
    public static function lzz_pdpSelect($name)
    {
        try {
            if($name == null){
                $data = Pdp::join('userinfo as uo','uo.id','pdp.id')
                    ->select('pdp.id','uo.name','pdp.tiger','pdp.peacock','pdp.koala','pdp.owl','pdp.chameleon')
                    ->get();
                return $data;
            }else{
                $data = Pdp::join('userinfo as uo','uo.id','pdp.id')
                    ->select('pdp.id','uo.name','pdp.tiger','pdp.peacock','pdp.koala','pdp.owl','pdp.chameleon')
                    ->where('uo.name',$name)
                    ->get();
            }
            return $data;
        } catch(\Exception $e){
            logError('PDP性格测试查询错误',[$e->getMessage()]);
            return null;
        }

    }
}
