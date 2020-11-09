<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdp extends Model
{
    protected $table = "pdp";
    public $timestamps = true;
    protected $guarded = [];


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
    public static function addPdp($id,$tiger,$peacock,$Koala,$owl,$chameleon){
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
    public static function searchPdp($id){
        try{
            $data = self::where('id',$id)
                ->orderBy('created_at','DESC')
                ->select('tiger','peacock','Koala','owl')
                ->get();
            return $data;
        }catch(\Exception $e){
            logError('录入用户PDP测试信息失败',[$e->getMessage()]);
            return null;
        }

    /**
     * pdp测试的人数
     * @author caiwenpin <github.com/codercwp>
     * @return data
     */
    public static function cwp_pdpNum(){
        try {
            $data =  self::count();
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
