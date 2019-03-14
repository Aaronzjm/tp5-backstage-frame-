<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/13
 * Time: 13:59
 */

namespace app\common\validate;


class RegisterValidate extends BaseValidate
{
    protected $rule = [
        'username' => 'require|length:5,18',
        'password' => 'require|length:6,18',
        'rePassword' => 'require|confirm:password',
    ];

    protected $message = [
        'userName' => '用户名长度必须在6到18个字符间',
        'password' => '密码长度必须在6到18个字符间',
        'rePassword' => '两个密码必须统一',
    ];
}