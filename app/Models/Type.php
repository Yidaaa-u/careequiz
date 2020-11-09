<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = "hld_type";
    public $timestamps = true;
    protected $guarded = [];
    /**
     * Holland测试对应工作
     * @author caiwenpin <github.com/codercwp>
     * param string $holland
     * @return data
     */
    public static function cwp_job($holland){
        try {
            $data = self::select('type_desc')->where('type_name',$holland)->get();
            return $data;
        } catch (\Exception $e) {
            logError('查找失败', [$e->getMessage()]);
            return null;
        }
    }
}
