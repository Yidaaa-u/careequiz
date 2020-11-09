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
}
