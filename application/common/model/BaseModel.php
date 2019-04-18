<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/17
 * Time: 16:12
 */

namespace app\common\model;


use think\Model;

class BaseModel extends Model
{
    public function getAllandSort($name, $list, $status){
        $data = [
            'status'=>$status
        ];
        $sort = [
            $name => $list
        ];
        $rs = $this->where($data)
            ->order($sort)
            ->select();
        return json_decode($rs);
    }
}