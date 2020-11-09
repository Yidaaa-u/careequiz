<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    protected $table = "userinfo";
    public $timestamps = true;
    protected $guarded = [];

    /**
     * 用户基本信息填报
     * @param $age
     * @param $name
     * @param $qq
     * @param $gender
     * @param $education
     * @param $retiretime
     * @param $retiremode
     * @param $work
     * @param $useid
     * @return |null
     */
    public static function lzz_addInfo($age,$name,$qq,$gender,$education,$retiretime,$retiremode,$work,$useid){
        try {

            $data = Userinfo::insert([
                'id' => $useid,
                'age' => $age,
                'name' => $name,
                'qq' =>$qq,
                'gender' => $gender,
                'education' => $education,
                'retiretime' => $retiretime,
                'retiremode' => $retiremode,
                'work' =>$work,
            ]);
            return $data;
        } catch(\Exception $e){
            logError('用户信息填报错误',[$e->getMessage()]);
            return null;
        }
    }
}
