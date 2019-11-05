<?php

namespace app\admin\controller;

use app\admin\model\Admin;
use app\admin\model\LoginLog;
use app\admin\controller\CommonAction;
use think\Request;

class User extends CommonAction
{
   #显示会员显示视图
    public function userview()
    {

        return view();
    }
    #显示管理员管理视图
    public function adminview(){
        $loginLog=new LoginLog();
        $data=$loginLog->selectLog();
        return view('',compact('data'));
    }
    #显示后台登录日志视图
    public function alllog(){
        $loginLog=new LoginLog();
        $data=$loginLog->selectAllLog();
        return view('',compact('data'));
    }
    #显示新增管理员视图
    public function addadmin(){
        return view();
    }
    #添加管理员
    public function addadminpro(Request $request){
        $admin=new Admin();
        $data=$request->post();
        $ret=$admin->addAdmin(['username'=>$data['username'],'password'=>$data['password'],'power'=>$data['power'],'addtime'=>time()]);
        if($ret==1){
            $this->success('添加成功','admin/user/adminview');
        }else{
            $this->error('登录失败','admin/user/addadmin');
        }
    }
    #显示修改密码视图

    
}
