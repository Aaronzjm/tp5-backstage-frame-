<?php
namespace app\admin\controller;


class Index extends BaseController
{
    /**
     * 后台系统首页
     */
    public function index()
    {
        return $this->fetch();
    }

    /**
     * 登陆后默认跳转的欢迎页面
     */
    public function welcome()
    {
        //Email::send('a645990059z@qq.com','邮件测试','这是邮件发送功能测试');
        return $this->fetch();
    }

    /**
     * 根据地址来获取该地址的经纬度
     */
    public function map(){
        return \Map::staticImage('浙江省绍兴市唯美花园');
    }

    /**
     * 后台登陆页面
     */
    public function login(){
        return $this->fetch();
    }


}
