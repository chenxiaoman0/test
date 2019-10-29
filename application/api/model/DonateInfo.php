<?php

namespace app\api\model;

use think\Db;
use think\Model;

class DonateInfo extends Model
{
    public function addInfo($data)
    {
        $res=db('bs_donate_info')->insert($data);
        return $res;
    }

    public function selectInfo($id)
    {
        if ($info =db('bs_donate_info')->where('u_id', $id)->select()) {
            $data=json_encode($info);
            return $data;
        }
    }
}
