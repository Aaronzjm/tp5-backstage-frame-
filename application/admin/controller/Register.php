<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/13
 * Time: 13:04
 */

namespace app\admin\controller;


use app\common\controller\BaseController;
use app\common\validate\RegisterValidate;

class Register extends BaseController
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model('User');
    }

    /**
     * 后台登陆注册页面
     */
    public function index(){
        return $this->fetch();
    }

    /**
     * 后台注册功能
     */
    public function register(){
        (new RegisterValidate())->goCheck();
        $post = $this->getData();;
        $rp = $this->obj->where('user_name',$post['username'])->select();
        if($rp){
            $this->error('改用户已经存在');
        }
        $data = [
            'username' => $post['username'],
            'password' => md5($post['password'])
        ];
        $res = $this->obj->save($data);
        if($res){
            session('username',$data['username']);
            $this->success('注册成功','index/index');
        }
        $this->error('注册失败');
    }
}