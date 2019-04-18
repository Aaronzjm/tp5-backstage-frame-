<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/3
 * Time: 13:23
 */

namespace app\common\model;



use think\Model;

class Banner extends BaseModel
{
    protected $hidden = ['create_time'];
    /**
     * 查询所有banner 并所需要排序
     * @param $type 需要排序的名称
     * @param $list 升序（asc）或降序（desc）
     * @return mixed
     */
    public function queryAll($type, $list){
        $data = [
            'status' => 1
        ];
        $order = [
            $type => $list
        ];
        $rs = $this->where($data)
            ->order($order)
            ->select();
        return json_decode($rs);
    }

    /**
     * @param $name 需要排序的类名
     * @param $list 正序或者倒序
     * @param $status 状态：1：激活 2：未激活
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getBannerAll($name, $list, $status=1){
        return $this->getAllandSort($name, $list, $status);
    }
}