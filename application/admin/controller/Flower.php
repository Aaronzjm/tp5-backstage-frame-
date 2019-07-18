<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/18
 * Time: 15:53
 */

namespace app\admin\controller;


class Flower extends BaseController
{
    private $obj;

    public function _initialize()
    {
        $this->obj=model('classify');
    }

    public function index(){
        $classify = $this->obj->getClassify('listOrder','asc');
        return $this->fetch('',[
            'classify' => $classify
        ]);
    }

    public function add_menu(){
        return $this->fetch();
    }

    public function save_menu(){
        $param = request()->param();
        $img = request()->file('img');
        $info = $img->move(ROOT_PATH . 'public' . DS . '/uploads/admin');
        $pic_name = $info->getSaveName();
        $data = [
            'name' => $param['name'],
            'pic_name' => '/uploads/admin/'.$pic_name,
            'describe' => $param['describe'],
            'listOrder' => $param['sort']
        ];
        $res = $this->obj->save($data);
        if($res){
            return returnData(1,'添加成功');
        }else{
            return returnData(0,'添加失败');
        }
    }

    /**
     * 删除分类
     */
    public function delete_menu(){
        $data = request()->param();
        $res = $this->obj->where([
            'id'=>$data['id']
        ])->delete();
        return returnData('1','删除成功',$res);
    }
}