<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/14
 * Time: 13:39
 */

namespace app\common\validate;


use think\Exception;
use think\Request;

class captchaValidate extends BaseValidate
{
    protected $rule = [
        'captcha' => 'require|captcha'
    ];

    protected $message = [
        'captcha' => '验证码输入错误'
    ];

    public function captchaCheck(){
        $request = Request::instance();
        $data = $request->param();
        if(!captcha_check($data['verifyCode'])){
            throw new Exception('验证码错误!!!');
        }
    }
}