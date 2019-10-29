<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class MDonateInfo extends Model
{
    #查询已完成预约订单
    public function selectCompleteInfo(){
        $data=Db::table('bs_donate_info')
            ->where('complete','=',1)
            ->select();
        return $data;
    }
    #查询为完成预约订单
    public function selectIncompleteInfo(){
        $data=Db::table('bs_donate_info')
            ->where('complete','=',0)
            ->select();
        return $data;
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
