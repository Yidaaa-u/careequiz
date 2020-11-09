<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Temperament extends Model
{
    protected $table = "temperament";
    public $timestamps = true;
    protected $guarded = [];
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
