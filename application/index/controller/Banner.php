<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/6/15
 * Time: 13:45
 */

namespace app\index\controller;



class Banner extends BaseController
{
    public function getAllBanner(){
        return $banners = model('Banner')->getBannerAll('sort','desc');
    }
}