<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/19
 * Time: 15:56
 */

namespace app\common\model;


class Classify extends BaseModel
{
    public function getClassify($name, $list, $status=1){
        return $this->getAllandSort($name, $list, $status);
    }
}