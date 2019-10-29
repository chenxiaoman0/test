<?php

namespace app\index\model;

use think\Db;
use think\Model;

class User extends Model
{
   public function selectinfo(){
        $data=Db::name('user')->paginate(5);
        return $data;
    }
    public function deleteinfo($id){
        $data=db('user')->delete($id);
        return $data;
    }
    public function addinfo($data){
        $ret=db('user')->insert($data);
        return $ret;
    }
    public function modifyview($id){
        $data=db('user')->find($id);
        // dump($data);
        return $data;
    }
    public function modifyinfo($data){
        $ret=db('user')->where('id',$data['id'])->update(['username'=>$data['username'],'age'=>$data['age'],'province'=>$data['province']]);
        return $ret;
        // dump($ret);
    }
}
