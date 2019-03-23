<?php
namespace app\common\model;

use think\Model;

class Category extends Model
{
    protected $hidden = ['create_time', 'update_time'];

    public function items(){
        return $this->hasMany('CategoryLv2','parent_id','id');
    }

    //protected $autoWriteTimestamp = true;或者database里直接配置
    public function add($data)
    {
        $data['status'] = 1;
        return $this->save($data);
    }

    /**
     * 获取通过的顶级栏目
     * @return 顶级栏目集合
     */
    public function getNormalFirstCategory()
    {
        $data = [
            'status' => 1
        ];
        $order = [
            'id' => 'desc'
        ];
        $level1 = $this->where($data)
            ->order($order)
            ->select();
        return $level1;
    }

    /**
     * 获取所有的顶级栏目
     * @return 顶级栏目集合
     */
    public function getFirstCategory()
    {
        $data = [
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
    }

    /**
     * 获取所有的栏目
     * @return 所有栏目集合
     */
    public static function getAllCategory(){
        $res = self::with(['items'])->select();
        return json_decode($res);
    }
}