<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Models\Hld;
use App\Models\Pdp;
use App\Models\Temperament;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * 气质测试回显测试状态回显
     * @return \Illuminate\Http\JsonResponse
     */
public function temperamentInfo()
{
     $useid = auth('user')->user()->useid;
    $data =  Temperament::lzz_temperamentInfo($useid);
    return $data ?
        json_success('成功!', $data, 200) :
        json_fail('失败!', null, 100);
}

    /**
     * PDP性格测试测试状态回显
     * @return \Illuminate\Http\JsonResponse
     */
    public function pdpInfo()
    {
        $useid = auth('user')->user()->useid;
        $data =  Pdp::lzz_pdpInfo($useid);
        return $data ?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);
    }

    /**
     * 霍兰德职业兴趣测试测试状态回显
     * @return \Illuminate\Http\JsonResponse
     */
    public function hollandInfo()
    {
        $useid = auth('user')->user()->useid;
        $data =  Hld::lzz_hollandInfo($useid);
        return $data ?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);
    }
}
