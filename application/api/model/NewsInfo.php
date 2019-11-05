<?php

namespace app\api\model;

use think\Db;
use think\Model;

class NewsInfo extends Model
{
    public function showInfo($type,$page)
    {
            $n=1;//每页显示多少条数据
            $star=($page-1)*$n;
            $end=$page*$n;
            $info=Db::name('bs_news')
            ->join('bs_classification c','c.c_id=bs_news.c_id')
            ->where('c.c_name',$type)
            ->limit($star,$end)
            ->select();
            return $info;
    }
    //获取特性类型最新数据
    public function selectNewest($type,$limit)
    {
        $info=Db::name('bs_news')
        ->join('bs_classification c','c.c_id=bs_news.c_id')
        ->where('c.c_name',$type)
        ->order('addtime desc')
        ->limit(0,$limit)
        ->select();
            return $info;
    }
    //获取全部最新数据
    public function selectAllNewest($limit){
        $info=Db::name('bs_news')
        ->join('bs_classification c','c.c_id=bs_news.c_id')
        ->order('addtime desc')
        ->limit(0,$limit)
        ->select();
        return $info;
    }
    public function selectInfo($id){
        $info=Db::name('bs_news')->where('id',$id)->find();
        return $info;
    }
    public function selectAllInfo($type){
        $info=Db::name('bs_news')->where('c_id',$type)->select();
        return $info;
    }

}
