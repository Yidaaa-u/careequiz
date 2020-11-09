<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temperament extends Model
{
    protected $table = "temperament";
    public $timestamps = true;
    protected $guarded = [];


    /**
     * 气质测评确定提交
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $id
     * @param int $a
     * @param int $b
     * @param int $c
     * @param int $d
     * @return array
     */

    Public static function cm_temSubmit($id,$a,$b,$c,$d){
        try{
            $data=self::create(
                [
                    'id'=>$id,
                    'a'=>$a,
                    'b'=>$b,
                    'c'=>$c,
                    'd'=>$d
                ]
            );
            return $data;
        }catch (\Exception $e){
            logError('获取实验室申请表信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 气质测试分数展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @param String $id
     * @return array
     */

    Public static function cm_temShow($id){
        try{
            $data=self::select('a','b','c','d')
            ->where('id',$id)
            ->orderBy('created_at','DESC')
            ->limit(1)
            ->get();
            return $data;
        }catch (\Exception $e){
            logError('获取实验室申请表信息错误',[$e->getMessage()]);
            return null;
        }
    }

    /**
     * 性格测试人数
     * @author caiwenpin <github.com/codercwp>
     * @return data
     */
    public static function cwp_temNum(){
        try {
            $data =  self::count();
            return $data;
        } catch (\Exception $e) {
            logError('查询失败',[$e->getMessage()]);
            return null;
        }
    }
    /**
     * 性格测试各项平均分
     * @author caiwenpin <github.com/codercwp>
     * @return data
     */
    public static function cwp_temAverage(){
        try {
            $data['A'] =  self::avg('a');
            $data['B'] =  self::avg('b');
            $data['C'] =  self::avg('c');
            $data['D'] =  self::avg('d');
            return $data;
        } catch (\Exception $e) {
            logError('查询失败',[$e->getMessage()]);
            return null;
        }
    }

}
