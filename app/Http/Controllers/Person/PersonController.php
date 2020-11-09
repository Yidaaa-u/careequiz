<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Userinfo;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * 用户基本信息填报
     * @param Request $personRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function addInfo(PersonRequest $personRequest)
    {
        $age = $personRequest['age'];
        $name = $personRequest['name'];
        $qq = $personRequest['qq'];
        $gender = $personRequest['gender'];
        $education = $personRequest['education'];
        $retiretime = $personRequest['retiretime'];
        $retiremode = $personRequest['retiremode'];
        $work = $personRequest['work'];
        $useid = auth('user')->user()->useid;
        $data = Userinfo::lzz_addInfo($age, $name, $qq, $gender, $education, $retiretime, $retiremode, $work, $useid);
        return $data?
            json_success('成功!', null, 200) :
            json_fail('失败!', null, 100);
    }
}
