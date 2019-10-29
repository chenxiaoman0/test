<?php

namespace app\index\model;

use think\Db;
use think\Model;

class UserInfo extends Model
{

    public function addinfo($data){
        $ret=db('userinfo')->insert($data);
        return $ret;

    }

    public function selectInfo($data)
    {


        if($info=Db::name('userinfo')->where('username',$data['username'])->find()){
            if($info['password']==$data['password']){
                return $info['id'];
            }else{
                return null;
            }
        }
    }

}
