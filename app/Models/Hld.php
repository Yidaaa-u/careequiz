<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hld extends Model
{

    protected $table = "hld";
    public $timestamps = true;
    protected $guarded = [];
    /**
     * 添加pdp测试结果
     * @author caiwenpin <github.com/codercwp>
     * param int $id,string $first,string $second,string $third
     * @return data
     */
    public static function cwp_add($id,$first,$second,$third){
           try {
            $data = self::create([
                'id' => $id,
                'first' =>$first,
                'second'=>$second,
                'third'=>$third,
            ]);
            return $data;
        } catch (\Exception $e) {
            logError('增加错误', [$e->getMessage()]);
            return null;
        }
    }
    /**
     * 返回pdp测试结果
     * @author caiwenpin <github.com/codercwp>
     * param int $userid
     * @return data
     */
    public static function cwp_res($userid){
        try {
            $data = self::select('first','second','third')->where('id',$userid)->orderBy('created_at','DESC')->limit(1)->get();
            return $data;
        } catch (\Exception $e) {
            logError('查找失败', [$e->getMessage()]);
            return null;
        }
    }
    /**
     * 已参与pdp测试人数
     * @author caiwenpin <github.com/codercwp>
     * @return data
     */
    public static function cwp_hollandNum(){
        try {
            $data =  self::count();
            return $data;
        } catch (\Exception $e) {
            logError('用户获取失败',[$e->getMessage()]);
            return null;
        }
    }
    /**
     * Holland的测试各项平均分
     * @author caiwenpin <github.com/codercwp>
     * @return data
     */
    public static function cwp_hollandAverage(){
        try {
            $R_count1 = self::select('first')->where('first','R')->count();
            $R_count2 = self::select('second')->where('second','R')->count();
            $R_count3 = self::select('third')->where('third','R')->count();
            $data['R'] = $R_count1+$R_count2+$R_count3;

            $A_count1 = self::select('first')->where('first','A')->count();
            $A_count2 = self::select('second')->where('second','A')->count();
            $A_count3 = self::select('third')->where('third','A')->count();
            $data['A'] = $A_count1+$A_count2+$A_count3;

            $I_count1 = self::select('first')->where('first','I')->count();
            $I_count2 = self::select('second')->where('second','I')->count();
            $I_count3 = self::select('third')->where('third','I')->count();
            $data['I'] = $I_count1+$I_count2+$I_count3;

            $S_count1 = self::select('first')->where('first','S')->count();
            $S_count2 = self::select('second')->where('second','S')->count();
            $S_count3 = self::select('third')->where('third','S')->count();
            $data['S'] = $S_count1+$S_count2+$S_count3;


            $E_count1 = self::select('first')->where('first','E')->count();
            $E_count2 = self::select('second')->where('second','E')->count();
            $E_count3 = self::select('third')->where('third','E')->count();
            $data['E'] = $E_count1+$E_count2+$E_count3;

            $C_count1 = self::select('first')->where('first','C')->count();
            $C_count2 = self::select('second')->where('second','C')->count();
            $C_count3 = self::select('third')->where('third','C')->count();
            $data['C'] = $C_count1+$C_count2+$C_count3;

            return $data;
        } catch (\Exception $e) {
            logError('查询失败',[$e->getMessage()]);
            return null;
        }
    }



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
