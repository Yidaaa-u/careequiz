<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\HollandController\addHollandRequest;
use App\Http\Requests\Test\HollandController\jobHollandRequest;
use App\Models\Hld;
use App\Models\Type;
use Symfony\Component\HttpFoundation\Request;


class HollandController extends Controller
{

        /*
         * 根据传入的信息排序后存入数据库
         * @author caiwenpin <github.com/codercwp>
         * @param addHollandRequest $request
         * return json
         */
    public function addHolland(addHollandRequest $request){
        $id = auth('user')->user()->useid;
        $res[0] = $request['R'];
        $res[1] = $request['A'];
        $res[2] = $request['I'];
        $res[3] = $request['S'];
        $res[4] = $request['E'];
        $res[5] = $request['C'];

        $date[0] = 'R';
        $date[1] = 'A';
        $date[2] = 'I';
        $date[3] = 'S';
        $date[4] = 'E';
        $date[5] = 'C';

        for($i=0;$i<5;$i++){
            for($j=0;$j<6-$i-1;$j++){
                if($res[$j]>$res[$j+1]){
                    $temp=$res[$j+1];
                    $res[$j+1]=$res[$j];
                    $res[$j]=$temp;

                    $temp=$date[$j+1];
                    $date[$j+1]=$date[$j];
                    $date[$j]=$temp;
                }
            }

        }
        $data = Hld::cwp_add($id,$date['5'],$date['4'],$date['3']);
        return $data?
              json_success('成功!',null,200):
              json_fail('失败!',null,100);
    }
        /*
         * 根据用户编号查询该用户霍兰德测试的结果
         * @author caiwenpin <github.com/codercwp>
         * @param TeachAddRequest $request
         * return json
         */

    public function resHolland(Request $request){
           $userid = auth('user')->user()->useid;
           $data = Hld::cwp_res($userid);
           return $data?
             json_success('成功!',$data,200) :
             json_fail('失败!',null,100);
    }

      /*
       * 根据传入的信息将对应的工作返回
       * @author caiwenpin <github.com/codercwp>
       * @param addHollandRequest $request
       * return json
       */
    public function jobHolland(jobHollandRequest $request){
            $holland = $request['holland'];
            $data = Type::cwp_job($holland);
            return $data?
                json_success('成功!',$data,200) :
                json_fail('失败!',null,100);
    }

}
