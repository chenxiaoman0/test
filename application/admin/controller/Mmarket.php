<?php

namespace app\admin\controller;

use app\admin\controller\CommonAction;
use think\facade\Session;
use think\Request;
// extends CommonAction
class Mmarket 
{
    //订单列表
    public function Goodslist(){
        return view();
    }
    //已完成订单
    //商品列表
    //添加商品
    public function addGoods(){
        return view();
    }
    //上传图片
    public function uploadimg(Request $request){
		$file = request()->file('file');
         $info = $file->move( '../uploads');
		if ($info) {
	    return json($info->getSaveName());
		}else{
            echo '上传失败';
        }
    }
    #删除图片
    public function delimg(Request $request){
        $file=$request->get();
        if(unlink('../uploads/'.$file['id'])){
           return view('upload');
        }
    }
}
