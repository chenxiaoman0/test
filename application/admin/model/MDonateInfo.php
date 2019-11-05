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
}
