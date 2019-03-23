<?php
namespace app\admin\controller;

use app\common\controller\BaseController;
use app\common\validate\IdMustPositiveInteger;

class Category extends BaseController
{
    private $obj;

    /**
     * 初始化model模型
     */
    public function _initialize()
    {
        $this->obj = model('Category');
    }

    /**
     * 一级栏目查询功能；到生活服务类
     * @return 返回所有的一级栏目
     */
    public function index()
    {
        $CLevel = $this->obj->getFirstCategory();
        return $this->fetch('',[
            'CLevel' => $CLevel,
        ]);
    }

    /**
     * 到栏目添加页面
     * @return 返回添加后所有的一级栏目
     */
    public function add()
    {
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('',[
            'categorys' => $categorys,
        ]);
    }

    /**
     * 栏目的添加和修改功能
     */
    public function save()
    {
        if(!request()->isPost()){
            $this->error('请求失败');
        }
        $data= input('post.');
        if(!empty($data['id'])){
            $this->update($data);
        }
        (new IdMustPositiveInteger())->goCheck();
        $res = $this->obj->add($data);
        if($res){
            $this->success('新增成功');
        }else{
            $this->error('新增失败');
        }
    }

    /**
     * @param int $id需更改栏目的id
     * @return 到栏目编辑页面
     */
    public function edit($id = 0)
    {
        $category = $this->obj->get($id);
        $categorys = $this->obj->getNormalFirstCategory();
        return $this->fetch('',[
            'category' => $category,
            'categorys' => $categorys
        ]);
    }

    /**
     * @param $data需要更新栏目的数据
     */
    public function update($data){
        $res = $this->obj->save($data,['id'=>intval($data['id'])]);
        if($res){
             $this->success('修改成功');
        }
        $this->error('修改失败');
    }

    /**
     * 修改栏目listOrder
     * @param $mes 返回修改排序结果
     */
    public function listOrder($mes){
        $res = $this->obj->save(['listOrder'=>$mes['listOrder']],['id'=>intval($mes['id'])]);
        if($res){
            $this->result($_SERVER['HTTP_REFERER'],1,'success');
        }
        $this->result($_SERVER['HTTP_REFERER'],0,'更新失败');
    }

    /**
     * 栏目状态的修改
     */
    public function status(){
        $data = input('get.');
        $res = $this->obj->save(['status'=>$data['status']],['id'=>intval($data['id'])]);
        if($res){
            $this->success('更新成功');
        }else{
            $this->error('更新失败');
        }
    }
}
