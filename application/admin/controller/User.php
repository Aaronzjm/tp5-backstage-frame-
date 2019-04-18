<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/22
 * Time: 14:33
 */

namespace app\admin\controller;


class User extends BaseController
{
    public function index(){
        return $this->fetch();
    }

    public function user_add(){
        return $this->fetch();
    }
}