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

            $data = self::where('id', $useid)
                ->exists();
            if ($data == null) {
                $data = "未测试";
            } else {
                $data = "已测试";
            }
            return $data;
        } catch (\Exception $e) {
            logError('PDP性格测试测试状态回显错误', [$e->getMessage()]);
        }

    }
    /**
     * 录入PDP各项分数
     * @author Dujingwen <github.com/DJWKK>
     * @param $id => 用户的id
     * @param $tiger => 老虎的分数
     * @param $peacock => 孔雀的分数
     * @param $Koala => 考拉的分数
     * @param $owl => 猫头鹰的分数
     * @param $chameleon => 变色龙的分数
     * @return |null
     */
    public static function djw_addPdp($id,$tiger,$peacock,$Koala,$owl,$chameleon){
        try{
            $data = self::create(
                [
                    'id'=>$id,
                    'tiger'=>$tiger,
                    'peacock'=>$peacock,
                    'Koala'=>$Koala,
                    'owl'=>$owl,
                    'chameleon'=>$chameleon
                ]
            );
            return $data;
        }catch(\Exception $e){
            logError('录入用户PDP测试信息失败',[$e->getMessage()]);

            return null;
        }
    }

    /**
     * 查找用户PDP最新的分数
     * @author Dujingwen <github.com/DJWKK>
     * @param $id => 用户的id
     * @return |null
     */
    public static function djw_searchPdp($id)
    {
        try {
            $data = self::where('id', $id)
                ->orderBy('created_at', 'DESC')
                ->select('tiger', 'peacock', 'Koala', 'owl','chameleon')
                ->get();
            return $data;
        } catch (\Exception $e) {
            logError('录入用户PDP测试信息失败', [$e->getMessage()]);
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
            if ($name == null) {
                $data = Pdp::join('userinfo as uo', 'uo.id', 'pdp.id')
                    ->select('pdp.id', 'uo.name', 'pdp.tiger', 'pdp.peacock', 'pdp.koala', 'pdp.owl', 'pdp.chameleon')
                    ->get();
                return $data;
            } else {
                $data = Pdp::join('userinfo as uo', 'uo.id', 'pdp.id')
                    ->select('pdp.id', 'uo.name', 'pdp.tiger', 'pdp.peacock', 'pdp.koala', 'pdp.owl', 'pdp.chameleon')
                    ->where('uo.name','like','%'.$name.'%')
                    ->get();
            }
            return $data;
        } catch (\Exception $e) {
            logError('PDP性格测试查询错误', [$e->getMessage()]);
            return null;
        }
    }

    /**
     * pdp测试的人数
     * @author caiwenpin <github.com/codercwp>
     * @return data
     */
    public static function cwp_pdpNum(){
        try {
            $data['pdpNumber'] =  self::distinct('id')->count();
            return $data;
        } catch (\Exception $e) {
            logError('用户获取失败',[$e->getMessage()]);
            return null;
        }
    }
    /**
     * pdp的各项平均分
     * @author caiwenpin <github.com/codercwp>
     * @return data
     */
    public static function cwp_pdpAverage(){
        try {
            $data['tiger'] =  self::avg('tiger');
            $data['peacock'] =  self::avg('peacock');
            $data['Koala'] =  self::avg('Koala');
            $data['owl'] =  self::avg('owl');
            $data['chameleon'] =  self::avg('chameleon');
            return $data;
        } catch (\Exception $e) {
            logError('查询失败',[$e->getMessage()]);
            return null;
        }


    }
}
