<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    private $obj;

    public function _initialize(){
        $this->obj = model('Banner');
    }
    public function index()
    {
        $banners = $this->obj->getBannerAll('sort','desc');
        /*$build = include APP_PATH.'build.php';运行application下的build文件生成自定义目录
        \think\Build::run($build);*/
        return $this->fetch('',[
            'banners' => $banners
        ]);
    }

    public function hello()
    {
        return '这是hello,地址：http://tp5_shop.com/index.php/index/index/hello';
    }
}
