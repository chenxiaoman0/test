<?php

namespace app\admin\model;

use think\Model;

class LoginLog extends Model
{
  public function addLog($data){
  $res=db('db_login_log')->data($data)->insert();
    return $res;
  }
  public function selectLog(){
    $data=db('db_login_log')->where('LoginState',1)->order('LoginTime','desc')->select();
    return $data;
  }
  #搜索全部登录记录
  public function selectAllLog(){
    $data=db('db_login_log')->order('LoginTime','desc')->select();
    return $data;
  }
}
