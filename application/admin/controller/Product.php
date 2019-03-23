<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/18
 * Time: 13:56
 */

namespace app\admin\controller;

use app\common\model\Category as modelCategory;
use app\common\controller\BaseController;
use think\Request;

class Product extends BaseController
{
    public function index(){
        return $this->fetch();
    }

    public function product_add(){
        $allCategory = modelCategory::getAllCategory();
        foreach ($allCategory as $k => $v){
            $allCategory[$k] = (self::object_to_array($allCategory[$k]));
        }
        return $this->fetch('',[
                'allCategory' => $allCategory,
            ]);
    }

    public function product_save(){
        $request = Request::instance();
        $data = $request->param();
        var_dump($data);exit();
    }
}