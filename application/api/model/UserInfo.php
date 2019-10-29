<?php

namespace app\api\model;

use think\Db;
use think\Model;

class UserInfo extends Model
{
    //登录验证
    public function selectInfo($data)
    {
        if($info=Db::name('userinfo')->where('username',$data['username'])->find()){
            if($info['password']==$data['password']){
                return $info['id'];
            }else{
                return true;
            }
        }
    }
    //注册
    public function addInfo($data){
        $ret=db('userinfo')->insert($data);
        return 1;
    }
}
