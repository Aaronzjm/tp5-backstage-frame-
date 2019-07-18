<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/8
 * Time: 11:36
 */

namespace app\common\validate;

use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        $request = Request::instance();
        $param = $request->param();
        $result = $this -> check($param);
        if($result){
            return true;
        }else{
            $error = $this->getError();
            return $error;
        }
    }

    /**
     * @param $value 需要验证的参数
     * @param string $rule
     * @param string $data
     * @param string $field
     * @return bool 返回验证是否是正整数
     */
    public function isPositiveInteger($value, $rule='', $data='', $field=''){
        if(is_int($value) && is_numeric($value) && ($value+1)>0){
            return true;
        }else{
            return false;
        }
    }
}