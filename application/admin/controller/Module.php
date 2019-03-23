<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23
 * Time: 10:54
 */

namespace app\admin\controller;


use app\common\controller\BaseController;

class Module extends BaseController
{
    public function index(){
        return $this->fetch();
    }
}