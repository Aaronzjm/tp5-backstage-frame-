<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/13
 * Time: 14:38
 */

namespace app\admin\controller;


use app\common\controller\BaseController;
use think\Request;

class Login extends BaseController
{
    private $obj;
    public function _initialize(){
        $this->obj = model('User');
    }
    /**
     * 登陆首页
     */
    public function index(){
        $request = Request::instance();
        $get = $request->param();
        if(!$get){
            $data = [
                'username' => '',
                'password' => ''
            ];
        }else{
            $data = $get;
        }
        return $this->fetch('',[
            'data' => $data
        ]);
    }

    /**
     * 登陆功能
     */
    public function login(){
        $data = $this->getData();
        $res = $this->obj->get(
            ['user_name'=>$data['username']],
            ['password'=>$data['password']]
        );
        if($res){
            $this->obj->save(['status'=>1],['user_name'=>$data['username']]);
            session('username',$data['username']);
            return $this->success('登陆成功','index/index');
        }else{
            return $this->error('登陆失败');
        }
    }
}