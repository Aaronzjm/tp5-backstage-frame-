<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/17
 * Time: 16:42
 */

namespace app\admin\controller;


use think\Controller;

class BaseController extends Controller
{
    /**
     * 检测是否登陆
     */
    /*public function _initialize(){
        if(!session('username')){
            $this->error('请先登陆','login/index');
        }
    }*/

    /**
     * 获取URL传过来的数据
     */
    public function getData(){
        $request = Request::instance();
        $data = $request->param();
        return $data;
    }

    public function object_to_array($obj){
        $_arr=is_object($obj)?get_object_vars($obj):$obj;
        $arr = null;
        foreach($_arr as $key=>$val){
            $val=(is_array($val))||is_object($val)?$this->object_to_array($val):$val;
            $arr[$key]=$val;
        }
        return $arr;
    }
}