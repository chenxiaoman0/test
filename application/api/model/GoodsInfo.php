<?php

namespace app\api\model;

use think\Db;
use think\Model;

class GoodsInfo extends Model
{
    public function selectGoodsDate($type,$page)
    {
            $n=2;//每页显示多少条数据
            $star=($page-1)*$n;
            $end=$page*$n;
            $info=Db::name('bs_goods')
            ->join('bs_goods_kind c','c.c_id=bs_goods.c_id')
            ->where('c.c_name',$type)
            ->limit($star,$end)
            ->select();
            return $info;
    }
    //获取最新数据
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
    //获取商品详情数据
    public function selectInfo($id){
        $info=Db::name('bs_goods')->where('g_id',$id)->find();
        return $info;
    }
    public function selectAllInfo($type){
        $info=Db::name('bs_news')->where('c_id',$type)->select();
        return $info;
    }
}
