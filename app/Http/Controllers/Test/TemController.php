<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\TemShowRequest;
use App\Http\Requests\Test\TemSubmitRequest;
use App\Models\Temperament;
use Illuminate\Http\Request;

class TemController extends Controller
{
    /**
     * 气质测评确定提交
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return json
     */
    Public function temSubmit(TemSubmitRequest $request){
        $a = $request->input('a');
        $b = $request->input('b');
        $c = $request->input('c');
        $d = $request->input('d');
        $id=auth('user')->user()->useid;
        $data=Temperament::cm_temSubmit($id,$a,$b,$c,$d);
        return $data ?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);
    }

    /**
     * 气质测试分数展示
     * @author ChenMiao <github.com/Yidaaa-u>
     * @return json
     */
    Public function temShow(TemShowRequest $request){
        $id=auth('user')->user()->useid;
        $data=Temperament::cm_temShow($id);
        return $data ?
            json_success('成功!', $data, 200) :
            json_fail('失败!', null, 100);
    }
}
