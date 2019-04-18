<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/17
 * Time: 16:41
 */

namespace app\index\controller;


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
}