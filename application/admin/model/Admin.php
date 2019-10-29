<?php

namespace app\admin\model;

use think\Model;

class Admin extends Model
{
    public function selectinfo($data){
      if($info=Admin::where('username',$data['username'])->find()){
        // if($info['password']==$data['password']){
        //     return 1;
        // }else{
        //     return 0;
    //   }
        dump($info);
        }
      }
}
