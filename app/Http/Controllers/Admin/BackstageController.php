<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hld;
use App\Models\Pdp;
use App\Models\Temperament;
use Illuminate\Http\Request;

class BackstageController extends Controller
{

    /**
     * 气质测试后台回显详情
     * @return \Illuminate\Http\JsonResponse
     */
     Public function temperamentBack(){

         $data = Temperament::lzz_temperamentBack();
         return $data?
             json_success('成功!', $data, 200) :
             json_fail('失败!', null, 100);

       }

    /**
     * PDP性格测试后台回显详情
     * @return \Illuminate\Http\JsonResponse
     */
    Public function pdpBack(){

        $data = Pdp::lzz_pdpBack();
        return $data?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);

    }


    /**
     * 霍兰德职业兴趣测后台回显详情
     * @return \Illuminate\Http\JsonResponse
     */
    Public function hollandBack(){

        $data = Hld::lzz_hollandBack();
        return $data?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);

    }
}
