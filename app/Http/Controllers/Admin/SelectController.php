<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hld;
use App\Models\Pdp;
use App\Models\Temperament;
use Illuminate\Http\Request;

class SelectController extends Controller
{
    /**
     * 气质测试查询
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
	Public function temperamentSelect(Request  $request ){
	    $name = $request['name'];
	    $data =  Temperament::lzz_temperamentSelect($name);

        return $data?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);
    }


    /**
     * PDP性格测试查询
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    Public function pdpSelect(Request  $request ){
        $name = $request['name'];
        $data =  Pdp::lzz_pdpSelect($name);

        return $data?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);
    }

    /**
     * 霍兰德职业兴趣查询
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    Public function hollandSelect(Request  $request ){
        $name = $request['name'];
        $data =  Hld::lzz_hollandSelect($name);

        return $data?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);
    }
}
