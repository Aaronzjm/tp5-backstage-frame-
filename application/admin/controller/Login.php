<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/13
 * Time: 14:38
 */

namespace app\admin\controller;


use app\common\validate\captchaValidate;
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
        (new captchaValidate())->captchaCheck();//后台验证验证码
        $data = $this->getData();
        $res = $this->obj->get(
            ['username'=>$data['username']]
        );
        if($res['password']==md5($data['password'])){
            $this->obj->save(['status'=>1],['username'=>$data['username']]);
            session('username',$data['username']);
            return $this->success('登陆成功','index/index');
        }else{
            return $this->error('密码错误');
        }
    }
}