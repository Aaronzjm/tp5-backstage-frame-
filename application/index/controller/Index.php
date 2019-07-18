<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        /*$build = include APP_PATH.'build.php';运行application下的build文件生成自定义目录
        \think\Build::run($build);*/
        $menus = model('Classify')->getClassify('listOrder','desc');
        return $this->fetch('',[
            'menu' => $menus
        ]);
    }

    public function hello()
    {
        return '这是hello,地址：http://tp5_shop.com/index.php/index/index/hello';
    }
}
