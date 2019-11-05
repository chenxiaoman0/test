<?php

namespace app\admin\model;

use think\Db;
use think\Model;

class MgoodsInfo extends Model
{
    public function insert($data)
    {
        $data=["u_id"=>$data['u_id'],'title'=>$data['title'],'c_id'=>$data['c_id'],'price'=>$data['price'],'degree'=>$data['degree'],'dec'=>$data['dec'],'imgpath'=>$data['imgpath'],'addtime'=>time()];
       $res=Db::table('bs_goods')->insert($data);
        return $res;
    }
        // 查询商品列表
        public function selectGoods(){
            $data=db('bs_goods')
            ->join('bs_goods.kind','bs_goods_kind.c_id=bs_goods.c_id')
            ->join('userinfo','userinfo.id=bs_goods.u_id')
            ->select();
            return $data;
        }
}
