<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdp extends Model
{
    protected $table = "pdp";
    public $timestamps = true;
    protected $guarded = [];
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
