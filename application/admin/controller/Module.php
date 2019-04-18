<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/23
 * Time: 10:54
 */

namespace app\admin\controller;

use think\Request;

class Module extends BaseController
{
    private $obj;

    public function _initialize(){
        $this->obj = model('Banner');
    }

    public function index(){
        $data = $this->obj->getBannerAll('sort', 'asc');
        return $this->fetch('', [
            'data' => $data
        ]);
    }

    public function add_banner(){
        return $this->fetch();
    }

    /**
     * 添加banner图片
     */
    public function save_banner(){
        $request = Request::instance();
        $data = $request->param();
        $file = request()->file('img');
        $info = $file->move(ROOT_PATH . 'public' . DS . '/uploads/admin');
        $pic_name = $info->getSaveName();
        $datas = [
            'name' => $data['name'],
            'pic_path' => '/uploads/admin/'.$pic_name,
            'sort' => $data['sort']
        ];
        $res = $this->obj->save($datas);
//        $a = $this->obj->queryAll('create_time', 'desc');
//        $banner = $a[0];
        if($res){
            return returnData(1,'添加成功');
        }else{
            return returnData(0,'添加失败');
        }
    }

    /**
     * 删除banner
     */
    public function delete_banner(){
        $request = Request::instance();
        $data = $request->param();
        $res = $this->obj->where([
            'id'=>$data['id']
        ])->delete();
        return returnData('1','删除成功',$res);
    }
}