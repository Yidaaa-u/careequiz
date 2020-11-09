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
     * 获取全部用户信息
     * @author Dujingwen <github.com/DJWKK>
     * @return |null
     */
    public static function searchInfo(){
        try{
            $data = self::select('*')
            ->paginate(10);
            return $data;
        }catch(\Exception $e){
            logError('获取全部用户信息失败',[$e->getMessage()]);
            return null;
        }
    }
    /**
     * 查找某个用户信息
     * @param $name => 搜索的姓名
     * @return |null
     */
    public static function single($name){
        try{
            $data = self::where('name','like','%'.$name.'%')
                ->select('id','age','gender','education','retiretime','retiremode','work','name','qq')
                ->get();
            return $data;
        }catch(\Exception $e){
            logError('获取单个用户信息失败',[$e->getMessage()]);
            return null;
        }
    }
}
