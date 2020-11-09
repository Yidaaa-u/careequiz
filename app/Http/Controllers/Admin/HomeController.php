<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Hld;
use App\Models\Login;
use App\Models\Pdp;
use App\Models\Temperament;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * 查询已注册人数
     * @author caiwenpin <github.com/codercwp>
     * return json
     */
    public function allNum(){
        $data = Admin::cwp_all();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

       /**
        * 查询已性格测试的人数
        * @author caiwenpin <github.com/codercwp>
        * return json
        */
    public function temNum(){
        $data = Temperament::cwp_temNum();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

        /**
         * 查询已pdp测试的人数
         * @author caiwenpin <github.com/codercwp>
         * return json
         */
    public function pdpNum(){
        $data = Pdp::cwp_pdpNum();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

         /**
          * 查询已霍兰德测试的人数
          * @author caiwenpin <github.com/codercwp>
          * return json
          */
    public function hollandNum(){
        $data = Hld::cwp_hollandNum();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);

    }
       /**
        * 计算性格测试中ABCD的平均分
        * @author caiwenpin <github.com/codercwp>
        * return json
        */
    public function temAverage(){
        $data = Temperament::cwp_temAverage();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);

    }

       /**
        * 计算pdp测试中各个动物的平均分
        * @author caiwenpin <github.com/codercwp>
        * return json
        */
    public function pdpAverage(){
        $data = Pdp::cwp_pdpAverage();
        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);

    }

     /**
      * 计算霍兰德测试中各个字母出现的次数
      * @author caiwenpin <github.com/codercwp>
      * return json
      */
    public function hollandAverage(){
        $data = Hld::cwp_hollandAverage();

        return $data?
            json_success('成功!',$data,200) :
            json_fail('失败!',null,100);
    }

}
