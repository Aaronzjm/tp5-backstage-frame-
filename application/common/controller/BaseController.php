<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/7
 * Time: 13:15
 */

namespace app\common\controller;


use think\Controller;
use think\Request;

class BaseController extends Controller
{
    /**
     * 检测是否登陆
     */
    public function _initialize(){
        if(!session('username')){
            $this->error('请先登陆','login/index');
        }
    }

    /**
     * 获取URL传过来的数据
     */
    public function getData(){
        $request = Request::instance();
        $data = $request->param();
        return $data;
    }
}