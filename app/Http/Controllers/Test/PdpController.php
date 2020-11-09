<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\PdpShowRequest;
use App\Http\Requests\Test\PdpSubmitRequest;
use App\Models\Pdp;

class PdpController extends Controller
{
    /**
     * 获取PDP各项分数
     * @author Dujingwen <github.com/DJWKK>
     * @param PdpSubmitRequest $request
     *          ['tiger'] => 老虎分数
     *          ['peacock'] => 孔雀分数
     *          ['Koala'] => 考拉分数
     *          ['owl'] => 猫头鹰分数
     *          ['chameleon'] => 变色龙分数
     * @return Json
     */
    public function phpSubmit(PdpSubmitRequest $request){
        $id = auth('user')->user()->useid;
        $tiger = $request['tiger'];
        $peacock = $request['peacock'];
        $Koala = $request['Koala'];
        $owl = $request['owl'];
        $chameleon = $request['chameleon'];
        $data = Pdp::addPdp($id,$tiger,$peacock,$Koala,$owl,$chameleon);
        return $data?
            json_success('获取PDP各项分数成功',null,200) :
            json_fail('获取PDP各项分数失败',null,100);
    }


    /**
     * PDP测试分数展示
     * @author Dujingwen <github.com/DJWKK>
     * @param PdpShowRequest $request
     * @return Json
     */
    public function pdpShow(PdpShowRequest $request){
        $id = auth('user')->user()->useid;
        $data = Pdp::searchPdp($id);
        return $data?
            json_success('展示PDP各项分数成功',$data,200) :
            json_fail('展示PDP各项分数失败',null,100);
    }
}
