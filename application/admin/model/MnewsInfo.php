<?php

namespace app\admin\model;

use think\Model;

class MnewsInfo extends Model
{
  public function getList(){
    $data=db('bs_news')
    // ->join('bs_goods.kind','bs_goods_kind.c_id=bs_goods.c_id')
    // ->join('userinfo','userinfo.id=bs_goods.u_id')
    ->select();
    return $data;
  }
}
