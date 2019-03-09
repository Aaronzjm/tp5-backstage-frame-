<?php
namespace app\common\model;


use think\Model;

class Category extends Model
{
    //protected $autoWriteTimestamp = true;或者database里直接配置
    public function add($data)
    {
        $data['status'] = 1;
        return $this->save($data);
    }

    /**
     * 获取顶级栏目
     * @return 顶级栏目集合
     */
    public function getNormalFirstCategory()
    {
        $data = [
            'status' => 1,
            'parent_id' => 0
        ];
        $order = [
            'id' => 'desc'
        ];
        $level1 = $this->where($data)
            ->order($order)
            ->select();
        return $level1;
    }

    public function getFirstCategory($parent_id=0)
    {
        $data = [
            'parent_id' => $parent_id,
            'status' => ['neq',-1]
        ];
        $order = [
            'listOrder'=>'desc',
            'id' => 'desc'
        ];
        $res = $this->where($data)
            ->order($order)
            ->paginate();
        return $res;
        //echo $this->getLastSql();sql测试语句并输出
        //echo $parent_id;
    }
}