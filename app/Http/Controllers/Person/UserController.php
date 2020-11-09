<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\person\UserSearchRequest;
use App\Models\Userinfo;

class UserController extends Controller
{
    /**
     * 获取用户信息
     * @author Dujingwen <github.com/DJWKK>
     * @return Json
     */
    public function userDetails(){
        $data = Userinfo::djw_searchInfo();
        return $data?
            json_success('获取全部用户信息成功',$data,200) :
            json_fail('获取全部用户信息失败',null,100);
    }

    /**
     * 查找某个用户信息
     * @author Dujingwen <github.com/DJWKK>
     * @param UserSearchRequest $request
     *          ['name'] => 搜索的姓名
     * @return Json
     */
    public function userSearch(UserSearchRequest $request){
        $name = $request['name'];
        $data = Userinfo::djw_single($name);
        return $data?
            json_success('获取单个用户信息成功',$data,200) :
            json_fail('获取单个用户信息失败',null,100);
    }
}
