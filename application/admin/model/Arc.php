<?php

namespace app\admin\model;

use think\Model;

class Arc extends Model
{
    #新闻列表
    public function selectpro(){
        $data=db('db_arc')->join('db_user','db_user.u_id=db_arc.u_id')->join('db_kind','db_kind.k_id=db_arc.k_id')->select();
//        dump($data);
        return $data;
    }
    #新闻修改
    public function modifypro(){

    }
    #新闻删除
    public function deletepro(){

    }
    #新闻添加
    public function addinfo($data)
    {
        // var_dump($data);
       $ret=db('bs_news')->data(['title'=>$data['title'],'c_id'=>$data['c_id'],'content'=>$data['editorValue'],'dec'=>$data['dec'],'organization'=>$data['organization'],'u_id'=>$data['u_id'],'addtime'=>time()])->insert();
    }
}
