<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Cookie;

class CommonAction extends Controller
{
    public function initialize(){
        //判断用户是否已经登录
        if (!Cookie::get('loginFlag')) {
            $this->error('请先登录再进行浏览', 'Login/index');
        }
    }
}
