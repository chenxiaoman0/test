<?php

namespace app\admin\controller;

use app\admin\model\Admin;
use think\Controller;
use think\Request;

class Login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
       return view('login/login');
    }
    public function loginpro(Request $request){
      $admin=new Admin();
      $ret=$admin->selectinfo($request->post());
      if($ret==1){
        $this->success('登录成功','admin/index/index');
      }else{
        $this->error('登录失败','admin/login/admin');
      }
    }

}
