<?php

namespace app\api\controller;

use app\api\model\DonateInfo;
use think\Controller;
use think\Request;

class Donate extends Controller
{
    /**
     * 预约回收
     *
     * @return \think\Response
     */
    public function createDonateInfo(Request $request)
    {
        $donation=new DonateInfo();
        $res= $donation->addInfo($request->post());
       if($res){
           return 1;
       }else{
           return 0;
       }
    }
        public function readDonateInfo(Request $request)
        {
            $donation=new DonateInfo();
            $res= $donation->selectInfo($request->get('id'));
            if($res){
                return $res;
                var_dump($res);
            }else{
                return null;
            }
        }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
