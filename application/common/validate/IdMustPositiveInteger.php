<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/13
 * Time: 9:17
 */

namespace app\common\validate;


class IdMustPositiveInteger extends BaseValidate
{
    protected $rule = [
        'name' => 'isPositiveInteger'
    ];

    protected $message = [
        'name.isPositiveInteger' => 'ID必须是正整数',
    ];
}